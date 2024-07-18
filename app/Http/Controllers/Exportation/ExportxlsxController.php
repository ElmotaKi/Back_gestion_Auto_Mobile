<?php



namespace App\Http\Controllers\Exportation;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use App\Http\Controllers\Controller;
use App\Models\AgenceLocation;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\ClientParticulier;
use App\Models\Commercial;
use App\Models\Contrat;
use App\Models\Parking;
use App\Models\Societe;
use App\Models\Vehicule;
use App\Models\Vidange;
use App\Models\Assurance;
use App\Models\Vignette;
use App\Models\VisiteTechnique;
use App\Models\Location; 
use App\Models\Pneumatique;
use App\Models\Historique;
use App\Models\Accident;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

class ExportxlsxController extends Controller
{
    private $modelMap = [
        "Agent" => Agent::class,
        "Agence" => AgenceLocation::class,
        "ClientParticulier" => ClientParticulier::class,
        "Commercial" => Commercial::class,
        "Contrat" => Contrat::class,
        "Parking" => Parking::class,
        "Societe" => Societe::class,
        "Vehicule" => Vehicule::class,
        "Vidange" => Vidange::class,
        "Assurance" => Assurance::class,
        "Vignette" => Vignette::class,
        "VisiteTechnique" => VisiteTechnique::class,
        "Location" => Location::class,
        "Pneumatique" => Pneumatique::class,
        "Historique" => Historique::class,
        "Accident" => Accident::class
    ];

    public function exportAgentsXlsx(Request $request, $model)
    {
        $selectedColumns = $request->input('columns', []);
        $agents = $this->retrieveModelData($model, $selectedColumns);

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
                $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $this->getNestedData($agent, $column));
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
        return \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex);
    }

    private function retrieveModelData($model, $selectedColumns)
    {
        if (!array_key_exists($model, $this->modelMap)) {
            return response()->json(['error' => 'Invalid model'], 400);
        }

        $modelClass = $this->modelMap[$model];
        $query = $modelClass::query();

        if (method_exists($modelClass, 'with')) {
            $relations = array_filter($selectedColumns, fn($col) => strpos($col, '.') !== false);
            $relations = array_map(fn($col) => explode('.', $col)[0], $relations);
            $query = $query->with($relations);
        }

        return $query->get();
    }

    private function getNestedData($agent, $column)
    {
        $fields = explode('.', $column);
        $value = $agent;

        foreach ($fields as $field) {
            $value = $value->$field ?? 'Information non disponible';
        }

        return $value;
    }

    public function exportAgentsPdf(Request $request, $model)
    {
        $selectedColumns = $request->input('columns', []);
        $agents = $this->retrieveModelData($model, $selectedColumns);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $pdf = new Dompdf($options);
        $pdf->setPaper('A2', 'landscape');

        $html = $this->generatePDFContent($agents, $selectedColumns);

        $pdf->loadHtml($html);
        $pdf->render();

        return response($pdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="agents.pdf"');
    }

    private function generatePDFContent($agents, $selectedColumns)
    {
        $html = '<style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }
                    table, th, td {
                        border: 1px solid black;
                        padding: 4px;
                        font-size: 10px;
                    }
                    @page {
                        size: A2;
                        margin: 0;
                    }
                </style>';
        $html .= '<table><thead><tr>';

        foreach ($selectedColumns as $column) {
            $html .= '<th>' . $column . '</th>';
        }

        $html .= '</tr></thead><tbody>';

        foreach ($agents as $agent) {
            $html .= '<tr>';
            foreach ($selectedColumns as $column) {
                if ($column == "Societe" || $column == "RaisonSocial") {
                    $html .= '<td>' . $agent->Societe->RaisonSocial . '</td>';
                } else {
                    $html .= '<td>' . $this->getNestedData($agent, $column) . '</td>';
                }
            }
            $html .= '</tr>';
        }

        $html .= '</tbody></table>';
        return $html;
    }

    public function print(Request $request, $model)
    {
        $pdfContent = $this->generatePDFContent(
            $this->retrieveModelData($model, $request->input('columns', [])),
            $request->input('columns', [])
        );

        $dompdf = new Dompdf();
        $dompdf->loadHtml($pdfContent);
        $dompdf->setPaper('A2', 'landscape');
        $dompdf->render();

        return response()->json(['url' => 'data:application/pdf;base64,' . base64_encode($dompdf->output())]);
    }
    public function printContrat(Request $request)
    {
        $contrat = $request->input('contrat');

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        // Generate your HTML content here
        $html = '<h2>' . $contrat['nomContrat'] . '</h2>';
        $html .= '<h3>Objet du contrat :</h3>';
        $html .= '<p>' . $contrat['descriptionContrat'] . '</p>';
        // Add the rest of the contract details as HTML
        $html .= '<hr /><p>';
        $html .= '<strong>Nom de l\'entreprise prestataire de services :</strong> ____________________________<br />';
        $html .= '<strong>Adresse :</strong> ____________________________<br />';
        $html .= '<strong>Téléphone :</strong> ____________________________<br />';
        $html .= '<strong>Courriel :</strong> ____________________________<br />';
        $html .= '</p><p>';
        $html .= '<strong>Nom du client :</strong> ____________________________<br />';
        $html .= '<strong>Adresse :</strong> ____________________________<br />';
        $html .= '<strong>Téléphone :</strong> ____________________________<br />';
        $html .= '<strong>Courriel :</strong> ____________________________<br />';
        $html .= '</p><h3>Fait en deux exemplaires, à _____________________ , le ____________________________</h3>';
        $html .= '<p><strong>Signature du Prestataire :</strong> ____________________<br />';
        $html .= '<strong>Signature du Client :</strong> ____________________</p>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $output = $dompdf->output();
        $filename = 'contrat_' . time() . '.pdf';
        file_put_contents(public_path($filename), $output);

        return response()->json(['url' => url($filename)]);
    }

    public function printContratWord(Request $request)
{
    $contrat = $request->input('contrat');

    $phpWord = new PhpWord();

    $section = $phpWord->addSection();
    $section->addTitle($contrat['nomContrat'], 1);
    $section->addTitle('Objet du contrat :', 2);
    $section->addText($contrat['descriptionContrat']);
    $section->addTextBreak(1);
    $section->addText('Nom de l\'entreprise prestataire de services : ____________________________');
    $section->addText('Adresse : ____________________________');
    $section->addText('Téléphone : ____________________________');
    $section->addText('Courriel : ____________________________');
    $section->addTextBreak(1);
    $section->addText('Nom du client : ____________________________');
    $section->addText('Adresse : ____________________________');
    $section->addText('Téléphone : ____________________________');
    $section->addText('Courriel : ____________________________');
    $section->addTextBreak(1);
    $section->addTitle('Fait en deux exemplaires, à _____________________ , le ____________________________', 3);
    $section->addText('Signature du Prestataire : ____________________');
    $section->addText('Signature du Client : ____________________');

    $filename = 'contrat_' . time() . '.docx';
    $path = public_path($filename);

    $writer = IOFactory::createWriter($phpWord, 'Word2007');
    $writer->save($path);

    return response()->json(['url' => url($filename)]);
}
}

