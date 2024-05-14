<?php

namespace App\Http\Controllers\Exportation;

use App\Http\Controllers\Controller;
use App\Models\AgenceLocation;
use Illuminate\Http\Request;
use App\Models\Agent;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Dompdf\Dompdf;
use Dompdf\Options;
class ExportxlsxController extends Controller
{
        public function exportAgentsXlsx(Request $request, $model)
        {
            $selectedColumns = $request->input('columns', []);
    
            if ($model == "Agent") {
                $agents = Agent::with('agenceLocation')->get();
            } else if ($model == "AgenceLocation") {
                $agents = AgenceLocation::all();
            } else {
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
                    } else {
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

        if ($model == "Agent") {
            $agents = Agent::with('agenceLocation')->get();
        } elseif ($model == "AgenceLocation") {
            $agents = AgenceLocation::all();
        } else {
            return response()->json(['error' => 'Invalid model'], 400);
        }

        $pdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $pdf->setOptions($options);

        // Generate HTML content for the PDF
        $html = '<style>';
        $html .= 'table { 
            border-collapse: collapse;
            width: 100%; 
        }';
        $html .= 'table, th, td { 
            border: 1px solid black; 
            padding: 4px; 
            font-size: 10px; /* Smaller font size */
        }';
        $html .= '@page { 
            size: A4; /* Page size */
            margin: 0; /* No margins */
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
                if ($column == "Agence") {
                    $html .= '<td>' . $agent->agenceLocation->NomAgence . '</td>';
                } else {
                    $html .= '<td>' . $agent->{$column} . '</td>';
                }
            }
            $html .= '</tr>';
        }

        $html .= '</tbody>';
        $html .= '</table>';

        // Load HTML content into the PDF
        $pdf->loadHtml($html);

        // Optionally set the paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Render the PDF
        $pdf->render();

        // Download the PDF
        $output = $pdf->output();

        // Send the PDF as an HTTP response for download
        return response($output)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="agents.pdf"');
    }
    public function print(Request $request, $model)
    {
        // Generate the PDF content
        $pdfContent = $this->generatePDFContent($request->input('columns'), $model);

        // Generate the PDF file
        $dompdf = new Dompdf();
        $dompdf->loadHtml($pdfContent);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Return the PDF content
        return response()->json(['url' => 'data:application/pdf;base64,' . base64_encode($dompdf->output())]);
    }

    private function generatePDFContent($columns, $model)
    {
        // Generate the PDF content based on the selected columns
        $html = '<style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    th, td {
                        border: 1px solid black;
                        padding: 8px;
                        word-wrap: break-word; /* Prevent text overflow */
                    }
                </style>';
        $html .= '<table>';
        $html .= '<tr>';
        foreach ($columns as $column) {
            $html .= '<th>' . $column . '</th>';
        }
        $html .= '</tr>';

        // Retrieve agents with only the selected columns
        if ($model == "Agent") {
            $agents = Agent::with('agenceLocation')->get();
        } elseif ($model == "AgenceLocation") {
            $agents = AgenceLocation::all();
        }

        foreach ($agents as $agent) {
            $html .= '<tr>';
            foreach ($columns as $column) {
                if ($column == "Agence") {
                    $html .= '<td>' . $agent->agenceLocation->NomAgence . '</td>';
                } else {
                    $html .= '<td>' . $agent->{$column} . '</td>';
                }
            }
            $html .= '</tr>';
        }

        $html .= '</table>';

        return $html;
    }
    
    
}