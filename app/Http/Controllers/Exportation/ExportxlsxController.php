<?php

namespace App\Http\Controllers\Exportation;

use App\Http\Controllers\Controller;
use App\Models\AgenceLocation;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\ClientParticulier;
use App\Models\Commercial;
use App\Models\Contrat;
use App\Models\Societe;
use App\Models\Vehicule;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Dompdf\Dompdf;
use Dompdf\Options;
class ExportxlsxController extends Controller
{
    public function exportAgentsXlsx(Request $request, $model)
{
    $selectedColumns = $request->input('columns', []);

    // Récupérer tous les agents
    if ($model == "Agent") {
       
        // Retrieve agents with their associated AgenceLocation and select the desired columns
        $agents = Agent::with('agenceLocation:NomAgence')->get($selectedColumns);
    } elseif ($model == "AgenceLocation") {
        // Retrieve all AgenceLocations
        $agents = AgenceLocation::all($selectedColumns);
    }
    else if($model == "ClientParticulier"){
        $agents=ClientParticulier::all();
    }
    else if($model == "Contrat"){
        $agents=Contrat::all();
    }
    else if($model == "Commercial"){
        $agents=Commercial::with('societe')->get();
    }
    else if($model == "Vehicule"){
        $agents=Vehicule::with('agenceLocation','parking')->get();
    }
    else if($model == "Societe"){
        $agents=Societe::get();
    }
    else {
        return response()->json(['error' => 'Invalid model'], 400);
    }
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Headers
    $columnIndex = 1;
    foreach ($selectedColumns as $column) {
        $sheet->setCellValue($this->getColumnLetter($columnIndex) . '1', $column);
        $columnIndex++;
    }

    // Data
    $row = 2;
    foreach ($agents as $agent) {
        $columnIndex = 1;
        foreach ($selectedColumns as $column) {
          
            if ($column == "Agence") {
                $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->agenceLocation->NomAgence);
            }
            else if($column=="Societe"){
                
                $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->societe->RaisonSocial);
            } else if($column=="ClientParticulier"){
                $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->ClientParticulier->Nom);
            }
            else if($column=="Contrat"){
                $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->Contrat->nomContrat);
            }
            else if($column=="Vehicule"){
                
                $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->Vehicule->Marque);
            } 
            else {
                $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->{$column});
            }
            $columnIndex++;
        }
        $row++;
    }

    // Set the filename and write to file
    $filename = 'agents.xlsx';
    $writer = new Xlsx($spreadsheet);
    $writer->save($filename);
    // Download the file
    return response()->download($filename)->deleteFileAfterSend(true);
}
      
    private function getColumnLetter($columnIndex)
    {
        // Convertit l'index de la colonne en lettre
        return \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex);
    }

   

    public function exportAgentspdf(Request $request, $model)
    {
        $selectedColumns = $request->input('columns', []);
    
        // Récupérer tous les agents
        if ($model == "Agent") {
            $agents = Agent::with('agenceLocation')->get('NomAgence');
        }
        elseif ($model == "Vehicule") {
            $agents = Vehicule::with('agenceLocation','parking')->get();
        }
         elseif ($model == "AgenceLocation") {
            $agents = AgenceLocation::all();
        }
        else if($model == "ClientParticulier"){
            $agents=ClientParticulier::all();
        }
        else if($model == "Contrat"){
            $agents=Contrat::all();
        }
        else if($model == "Commercial"){
            $agents=Commercial::with('societe')->get();
        }
        else if($model == "Societe"){
            $agents=Societe::get();
        }
        else {
            return response()->json(['error' => 'Invalid model'], 400);
        }

        $pdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $pdf->setOptions($options);
    
        // Générer le contenu HTML du PDF
        $html = '<style>';
        $html .= 'table { 
            border-collapse: collapse;
            width: 100%; 
        }';
        $html .= 'table, th, td { 
            border: 1px solid black; 
            padding: 4px; 
            font-size: 10px; /* Taille de la police plus petite */
        }';
        $html .= '@page { 
            size: A4; /* Taille de la page */
            margin: 0; /* Pas de marges */
        }';
        $html .= '</style>';
        $html .= '<table>';
        $html .= '<thead><tr>';
        foreach ($selectedColumns as $column) {
            $html .= '<th>' . $column . '</th>';
        }
        $html .= '</tr></thead>';
        $html .= '<tbody>';
        foreach ($agents as $agent) {
            $html .= '<tr>';
            foreach ($selectedColumns as $column) {
                $html .= '<td>' . $agent->{$column} . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</tbody>';
        $html .= '</table>';
    
        // Charger le contenu HTML dans le PDF
        $pdf->loadHtml($html);
    
        // (Optionnel) définir la taille du papier et l'orientation
        $pdf->setPaper('A4', 'portrait');
    
        // Rendre le PDF
        $pdf->render();
    
        // Télécharger le PDF
        $output = $pdf->output();
    
        // Envoyer le PDF en tant que réponse HTTP pour le téléchargement
        return response($output)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="agents.pdf"');
    }

    public function print(Request $request,$model)
    {
        // Générez le contenu du PDF
        $pdfContent = $this->generatePDFContent($request->input('columns'),$model);

        // Générez le fichier PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($pdfContent);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Retournez le contenu du PDF
        return response()->json(['url' => 'data:application/pdf;base64,' . base64_encode($dompdf->output())]);
    }

    private function generatePDFContent($columns, $model)
    {
        // Générez le contenu du PDF en fonction des colonnes sélectionnées
        // Exemple :
        $html = '<style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    th, td {
                        border: 1px solid black;
                        padding: 8px;
                        word-wrap: break-word; /* Ajout pour éviter le débordement de texte */
                    }
                </style>';
        $html .= '<table>';
        $html .= '<tr>';
        foreach ($columns as $column) {
            $html .= '<th>' . $column . '</th>';
        }
        $html .= '</tr>';
    
        // Récupérez les agents avec seulement les colonnes sélectionnées
        if ($model == "Agent") {
            $agents = Agent::all();
        } elseif ($model == "AgenceLocation") {
            $agents = AgenceLocation::all();
        }
        else if($model == "ClientParticulier"){
            $agents=ClientParticulier::all();
        }
        else if($model == "Contrat"){
            $agents=Contrat::all();
        }
        else if($model == "Commercial"){
            $agents=Commercial::with('societe')->get();
        }
        else if($model == "Vehicule"){
            $agents=Vehicule::with('agenceLocation','parking')->get();
        }
        else if ($model == "Societe") {
            $agents = Societe::get();
        }
        foreach ($agents as $agent) {
            $html .= '<tr>';
            foreach ($columns as $column) {
                if ($column == "Agence") {
                    $html .= '<td>' . $agent->agenceLocation->NomAgence . '</td>';
                } 
                else if($column == "Societe"){
                    $html .= '<td>' . $agent->societe->RaisonSocial . '</td>';
                }
                else if($column == "ClientParticulier"){
                    $html .= '<td>' . $agent->ClientParticulier->Nom . '</td>';
                }
                else if($column == "Contrat"){
                    $html .= '<td>' . $agent->Contrat->nomContrat . '</td>';
                }
                else if($column == "Vehicule"){
                    $html .= '<td>' . $agent->Vehicule->Marque . '</td>';
                }
                else {
                    $html .= '<td>' . $agent->{$column} . '</td>';
                }
            }
            $html .= '</tr>';
        }

        $html .= '</table>';

        return $html;
    }
    
    
}