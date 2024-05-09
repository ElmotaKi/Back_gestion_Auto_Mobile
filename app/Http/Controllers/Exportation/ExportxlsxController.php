<?php

namespace App\Http\Controllers\Exportation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Dompdf\Dompdf;
use Dompdf\Options;
class ExportxlsxController extends Controller
{
    public function exportAgentsXlsx(Request $request ,$model)
    {
        $selectedColumns = $request->input('columns', []);
        // Récupérer tous les agents
        if($model=="Agent"){
            $agents = Agent::all();
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
                // Utilisez la syntaxe de tableau pour accéder aux attributs
                $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->{$column});
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

    public function exportAgentspdf(Request $request , $model)
    {
        $selectedColumns = $request->input('columns', []);
    
        // Récupérer tous les agents
        if($model=="Agent"){
            $agents = Agent::all();
        }    
        $pdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $pdf->setOptions($options);
    
        // Générer le contenu HTML du PDF
        $html = '<style>';
    $html .= 'table { border-collapse: collapse; }';
    $html .= 'table, th, td { border: 1px solid black; }'; // Ajouter des bordures
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

    private function generatePDFContent($columns,$model)
    {
        // Générez le contenu du PDF en fonction des colonnes sélectionnées
        // Exemple :
        $html = '<table border="1">';
        $html .= '<tr>';
        foreach ($columns as $column) {
            $html .= '<th>' . $column . '</th>';
        }
        $html .= '</tr>';
    
        // Récupérez les agents avec seulement les colonnes sélectionnées
        if($model=="Agent"){
            $agents = Agent::select($columns)->get();
        }
        
    
        foreach ($agents as $agent) {
            $html .= '<tr>';
            foreach ($columns as $column) {
                $html .= '<td>' . $agent->$column . '</td>';
            }
            $html .= '</tr>';
        }
    
        $html .= '</table>';
    
        return $html;
    }
    


}
