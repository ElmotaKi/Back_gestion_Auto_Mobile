<?php

// namespace App\Http\Controllers\Exportation;

// use App\Http\Controllers\Controller;
// use App\Models\AgenceLocation;
// use Illuminate\Http\Request;
// use App\Models\Agent;
// use App\Models\ClientParticulier;
// use App\Models\Commercial;
// use App\Models\Contrat;
// use App\Models\Parking;
// use App\Models\Societe;
// use App\Models\Vehicule;
// use App\Models\Vidange;
// use App\Models\Assurance;
// use App\Models\Vignette;
// use App\Models\VisiteTechnique;
// use App\Models\Location; 
// use App\Models\Pneumatique;
// use App\Models\Historique;
// use App\Models\Accident;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use Dompdf\Dompdf;
// use Dompdf\Options;
// class ExportxlsxController extends Controller
// {
//     public function exportAgentsXlsx(Request $request, $model)
// {
//     $selectedColumns = $request->input('columns', []);

//     // Récupérer tous les agents
//     if ($model == "Agent") {
//         // Retrieve agents with their associated AgenceLocation and select the desired columns
//         $agents = Agent::with('agenceLocation')->get();
//     } elseif ($model == "Agence") {
        
//         $agents = AgenceLocation::all($selectedColumns);
//     }
//     elseif ($model == "Vidange") {
       
//         $agents = Vidange::with('Vehicule')->get();
//     }
//     elseif ($model == "Assurance") {

//         $agents = Assurance::with('Vehicule')->get();
//     }
//     else if($model == "ClientParticulier"){
//         $agents=ClientParticulier::all();
//     }
//     else if($model == "Contrat"){
//         $agents=Contrat::all();
//     }
//     else if($model == "Commercial"){
//         $agents=Commercial::with('societe')->get();
//     }
//     else if($model == "Vehicule"){
//         $agents=Vehicule::with('agenceLocation','parking')->get();
//     }
//     else if($model == "Societe"){
//         $agents=Societe::get();
//     }
   
//     else if($model == "Parking"){
//         $agents=Parking::get();
//     }
//     else if ($model == "Vignette") {
//         // Retrieve all AgenceLocations
//         $agents = Vignette::with('Vehicule')->get();
//     }else if ($model == "Historique") {
        
//         $agents = Historique::with('Vehicule')->get();
//     }
//     else if ($model == "Vignette") {
//         // Retrieve all AgenceLocations
//         $agents = Vignette::with('Vehicule')->get();
//     }
//     else if ($model == "Pneumatique") {
//         // Retrieve all AgenceLocations
//         $agents = Pneumatique::with('Vehicule')->get();
//     }
//     else if ($model == "VisiteTechnique") {
//         // Retrieve all AgenceLocations
//         $agents = VisiteTechnique::with('Vehicule')->get();
//     }
//     else if ($model == "Accident") {
//         // Retrieve all AgenceLocations
//         $agents = Accident::with('Vehicule')->get();
//     }
//     else if ($model == "Location") { 
//         $agents = Location::with('agent', 'clientParticulier', 'societe', 'vehicules', 'contrat')->get();
//     }
   
//     else {
//         return response()->json(['error' => 'Invalid model'], 400);
//     }
//     $spreadsheet = new Spreadsheet();
//     $sheet = $spreadsheet->getActiveSheet();

//     // Headers
//     $columnIndex = 1;
//     foreach ($selectedColumns as $column) {
//         $sheet->setCellValue($this->getColumnLetter($columnIndex) . '1', $column);
//         $columnIndex++;
//     }

//     // Data
//     $row = 2;
//     foreach ($agents as $agent) {
//         $columnIndex = 1;
//         foreach ($selectedColumns as $column) {
          
//             if ($column == "Agence") {
//                 $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->agenceLocation->NomAgence);
//             }
//             else if($column=="Societe"){
                
//                 $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->Societe->RaisonSocial);
//             } 
//             else if($column=="Historique"){
//                 $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->Historique->Type_reparation);
//             }
//             else if($column=="Pneumatique"){
                
//                 $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->pneumatique->Marque_Pneu);
//             }
           
//             else if($column=="ClientParticulier"){
//                 $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->ClientParticulier->Nom);
//             }
//             else if($column=="Contrat"){
//                 $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->Contrat->nomContrat);
//             }
//             else if($column=="Agent"){
//                 $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->Agent->NomAgent);
//             }
//             else if($column=="Vidange"){
//                 $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->Vidange->TypeVidange);
//             }
//             else if($column=="Assurance"){
//                 $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->Assurance->type_assurance);
//             }
//             else if($column=="Vignette"){
//                 $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->Vignette->status);
//             }
//             else if($column=="VisiteTechnique"){
//                 $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->VisiteTechnique->DateVisite);
//             }
//             else if($column=="Accident"){
//                 $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->Accident->DateVisite);
//             }
//             else if($column=="Vehicule" || $column=="Immatriculation"){
                
//                 $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->Vehicule->Immatriculation);
//             }
//             else if($model == "Parking"){
//                 $agents=Parking::all();
//             }
//             else if ($column == "Location") {
//                 $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->Location->dateDebutLocation);
//             }
//             else {
//                 $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $agent->{$column});
//             }
//             $columnIndex++;
//         }
//         $row++;
//     }

//     // Set the filename and write to file
//     $filename = 'agents.xlsx';
//     $writer = new Xlsx($spreadsheet);
//     $writer->save($filename);
//     // Download the file
//     return response()->download($filename)->deleteFileAfterSend(true);
// }
      
//     private function getColumnLetter($columnIndex)
//     {
//         // Convertit l'index de la colonne en lettre
//         return \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex);
//     }

   

//     public function exportAgentspdf(Request $request, $model)
//     {
//         $selectedColumns = $request->input('columns', []);
    
//         // Récupérer tous les agents
//         if ($model == "Agent") {
//             $agents = Agent::with('agenceLocation')->get();
//         }
//         elseif ($model == "Vehicule") {
//             $agents = Vehicule::with('agenceLocation','parking')->get();
//         }
//          elseif ($model == "Agence") {
//             $agents = AgenceLocation::all();
//         }
//         else if($model == "ClientParticulier"){
//             $agents=ClientParticulier::all();
//         }
//         else if($model == "Contrat"){
//             $agents=Contrat::all();
//         }
       
//         else if($model == "Commercial"){
//             $agents=Commercial::with('societe')->get();
//         }
//         else if($model == "Vidange"){
//             $agents=Vidange::with('Vehicule')->get();
//         }
//         else if($model == "Historique"){
//             $agents=Historique::with('Vehicule')->get();
//         }
//         else if($model == "Pneumatique"){
//             $agents=Pneumatique::with('Vehicule')->get();
//         }
//         else if($model == "Accident"){
//             $agents=Accident::with('Vehicule')->get();
//         }
//         else if($model == "Assurance"){
//             $agents=Assurance::with('Vehicule')->get();
//         }
//         else if($model == "Vignette"){
//             $agents=Vignette::with('Vehicule')->get();
//         }
//         else if($model == "VisiteTechnique"){
//             $agents=VisiteTechnique::with('Vehicule')->get();
//         }
//         else if($model == "Societe"){
//             $agents=Societe::get();
//         }
//         else if($model == "Parking"){
//             $agents=Parking::all();
//         }
       
//         else {
//             return response()->json(['error' => 'Invalid model'], 400);
//         }

//         $pdf = new Dompdf();
//         $options = new Options();
//         $options->set('isHtml5ParserEnabled', true);
//         $pdf->setOptions($options);
    
//         // Générer le contenu HTML du PDF
//         $html = '<style>';
//         $html .= 'table { 
//             border-collapse: collapse;
//             width: 100%; 
//         }';
//         $html .= 'table, th, td { 
//             border: 1px solid black; 
//             padding: 4px; 
//             font-size: 10px; /* Taille de la police plus petite */
//         }';
//         $html .= '@page { 
//             size: A2; /* Taille de la page */
//             margin: 0; /* Pas de marges */
//         }';
//         $html .= '</style>';
//         $html .= '<table>';
//         $html .= '<thead><tr>';
//         foreach ($selectedColumns as $column) {
//             $html .= '<th>' . $column . '</th>';
//         }
//         $html .= '</tr></thead>';
//         $html .= '<tbody>';
//         foreach ($agents as $agent) {
//             $html .= '<tr>';
//             foreach ($selectedColumns as $column) {
//                 if($column=='Societe' || $column=='RaisonSocial' ){
//                     $html .= '<td>' . $agent->Societe->Lieu . '</td>';
//                     if (isset($agent->Societe) && $agent->Societe !== null) {
//                         $html .= '<td>' . $agent->Societe->RaisonSocial . '</td>';
//                     } else {
                        
//                         $html .= '<td>Information non disponible</td>';
//                     }
//                 }
               
//                 else if($column=='Agence' || $column=='NomAgence'){
//                     $html .= '<td>' . $agent->agenceLocation->NomAgence . '</td>';
//                     if (isset($agent->agenceLocation) && $agent->agenceLocation !== null) {
//                         $html .= '<td>' . $agent->agenceLocation->NomAgence . '</td>';
//                     } else {
                        
//                         $html .= '<td>Information non disponible</td>';
//                     }
//                 }
//                 else if($column == "Parking" || $column == "Lieu"){
//                     $html .= '<td>' . $agent->parking->Lieu . '</td>';
//                     if (isset($agent->Parking) && $agent->Parking !== null) {
//                         $html .= '<td>' . $agent->parking->Lieu . '</td>';
//                     } else {
                        
//                         $html .= '<td>Information non disponible</td>';
//                     }
//                 }
//                 else if ($column == "Vehicule" || $column == "Immatriculation") {
//                     if (isset($agent->Vehicule) && $agent->Vehicule !== null) {
//                         $html .= '<td>' . $agent->Vehicule->Immatriculation . '</td>';
//                     } else {
                        
//                         $html .= '<td>Information non disponible</td>';
//                     }
//                 }
//                 else if ($column == "Contrat" || $column == "nomContrat") {
//                     if (isset($agent->Contrat) && $agent->Contrat !== null) {
//                         $html .= '<td>' . $agent->Contrat->nomContrat . '</td>';
//                     } else {
                        
//                         $html .= '<td>Information non disponible</td>';
//                     }
//                 }
//                 else if ($column == "Agent" || $column == "NomAgent") {
//                     if (isset($agent->Agent) && $agent->Agent !== null) {
//                         $html .= '<td>' . $agent->Agent->NomAgent . '</td>';
//                     } else {
                        
//                         $html .= '<td>Information non disponible</td>';
//                     }
//                 }
//                 else if ($column == "ClientParticulier" || $column == "NomClient") {
//                     if (isset($agent->ClientParticulier) && $agent->ClientParticulier !== null) {
//                         $html .= '<td>' . $agent->ClientParticulier->Nom . '</td>';
//                     } else {
                        
//                         $html .= '<td>Information non disponible</td>';
//                     }
//                 }
//                 else if($column == "Vidange"){
//                     $html .= '<td>' . $agent->Vidange->TypeVidange . '</td>';
//                 }
//                 else if($column == "Location"){
//                     $html .= '<td>' . $agent->Location->dateDebutLocation . '</td>';
//                 }
//                 else if($column == "Pneumatique"){
//                     $html .= '<td>' . $agent->Pneumatique->Marque_Pneu . '</td>';
//                 }
//                 else if($column == "Historique"){
//                     $html .= '<td>' . $agent->Historique->Type_reparation . '</td>';
//                 }
//                 else if($column == "Accident"){
//                     $html .= '<td>' . $agent->Accident->statut_resolution . '</td>';
//                 }
//                 else{

//                     $html .= '<td>' . $agent->{$column} . '</td>';
//                 }
//             }
//             $html .= '</tr>';
//         }
//         $html .= '</tbody>';
//         $html .= '</table>';
    
//         // Charger le contenu HTML dans le PDF
//         $pdf->loadHtml($html);
    
//         // (Optionnel) définir la taille du papier et l'orientation
//         $pdf->setPaper('A4', 'portrait');
    
//         // Rendre le PDF
//         $pdf->render();
    
//         // Télécharger le PDF
//         $output = $pdf->output();
    
//         // Envoyer le PDF en tant que réponse HTTP pour le téléchargement
//         return response($output)
//             ->header('Content-Type', 'application/pdf')
//             ->header('Content-Disposition', 'attachment; filename="agents.pdf"');
//     }

//     public function print(Request $request,$model)
//     {
//         // Générez le contenu du PDF
//         $pdfContent = $this->generatePDFContent($request->input('columns'),$model);

//         // Générez le fichier PDF
//         $dompdf = new Dompdf();
//         $dompdf->loadHtml($pdfContent);
//         $dompdf->setPaper('A2', 'landscape');
//         $dompdf->render();

//         // Retournez le contenu du PDF
//         return response()->json(['url' => 'data:application/pdf;base64,' . base64_encode($dompdf->output())]);
//     }

//     private function generatePDFContent($columns, $model)
//     {
//         // Générez le contenu du PDF en fonction des colonnes sélectionnées
//         // Exemple :
//         $html = '<style>
//                     table {
//                         width: 100%;
//                         border-collapse: collapse;
//                     }
//                     th, td {
//                         border: 1px solid black;
//                         padding: 8px;
//                         word-wrap: break-word; /* Ajout pour éviter le débordement de texte */
//                     }
//                 </style>';
//         $html .= '<table>';
//         $html .= '<tr>';
//         foreach ($columns as $column) {
//             $html .= '<th>' . $column . '</th>';
//         }
//         $html .= '</tr>';
    
//         // Récupérez les agents avec seulement les colonnes sélectionnées
//         if ($model == "Agent") {
//             $agents = Agent::all();
//         } elseif ($model == "Agence") {
//             $agents = agenceLocation::all();
//         }
//         else if($model == "ClientParticulier"){
//             $agents=ClientParticulier::all();
//         }
//         else if($model == "Contrat"){
//             $agents=Contrat::all();
//         }
//         else if($model == "Historique"){
//             $agents=Historique::with('Vehicule')->get();
//         }
//         else if($model == "Commercial"){
//             $agents=Commercial::with('societe')->get();
//         }
//         else if($model == "Vidange"){
//             $agents=Vidange::with('Vehicule')->get();
//         }
//         else if($model == "Accident"){
//             $agents=Accident::with('Vehicule')->get();
//         }
//         else if($model == "Pneumatique"){
//             $agents=Pneumatique::with('Vehicule')->get();
//         }
//         else if($model == "Assurance"){
//             $agents=Assurance::with('Vehicule')->get();
//         }
//         else if($model == "Vignette"){
//             $agents=Vignette::with('Vehicule')->get();
//         }
//         else if($model == "VisiteTechnique"){
//             $agents=VisiteTechnique::with('Vehicule')->get();
//         }
//         else if($model == "Vehicule"){
//             $agents=Vehicule::with('agenceLocation','parking')->get();
//         }
//         else if ($model == "Societe") {
//             $agents = Societe::get();
//         }
//         else if($model == "Parking"){
//             $agents=Parking::all();
//         }
//         foreach ($agents as $agent) {
//             $html .= '<tr>';
//             foreach ($columns as $column) {
//                 if ($column=='Agence' || $column=='NomAgence') {
//                     $html .= '<td>' . $agent->agenceLocation->NomAgence . '</td>';
//                 } 
//                 else if($column == "Societe" ){
//                     $html .= '<td>' . $agent->Societe->RaisonSocial . '</td>';
//                 }
//                 else if($column == "ClientParticulier"){
//                     $html .= '<td>' . $agent->ClientParticulier->Nom . '</td>';
//                 }
//                 else if($column == "Contrat" || $column == "nomContrat" ){
//                     $html .= '<td>' . $agent->Contrat->nomContrat . '</td>';
//                 }
//                 else if($column == "Agent" ){
//                     $html .= '<td>' . $agent->Agent->NomAgent . '</td>';
//                 }
//                 else if($column == "Parking" || $column == "Lieu"){
                   
//                     if (isset($agent->Parking) && $agent->Parking !== null) {
//                         $html .= '<td>' . $agent->parking->Lieu . '</td>';
//                     } else {
                        
//                         $html .= '<td>Information non disponible</td>';
//                     }
//                 }
//                  else if ($column == "Vehicule" || $column == "Immatriculation") {
//                     if (isset($agent->Vehicule) && $agent->Vehicule !== null) {
//                         $html .= '<td>' . $agent->Vehicule->Immatriculation . '</td>';
//                     } else {
                        
//                         $html .= '<td>Information non disponible</td>';
//                     }
//                 }
                
//                 else if($column == "Parking" || $column =="Lieu"){
//                     $html .= '<td>' . $agent->parking->Lieu . '</td>';
//                 }
//                 else if($column == "Vidange"){
//                     $html .= '<td>' . $agent->Vidange->TypeVidange . '</td>';
//                 }
//                 else if($column == "Accident"){
//                     $html .= '<td>' . $agent->Accident->statut_resolution . '</td>';
//                 }
//                 else if($column == "Assurance"){
//                     $html .= '<td>' . $agent->Assurance->type_assurance . '</td>';
//                 }
//                 else if($column == "Vignette"){
//                     $html .= '<td>' . $agent->Vignette->status . '</td>';
//                 }
//                 else if($column == "Pneumatique"){
//                     $html .= '<td>' . $agent->Pneumatique->Marque_Pneu . '</td>';
//                 }
//                 else if($column == "VisiteTechnique"){
//                     $html .= '<td>' . $agent->VisiteTechnique->DateVisite . '</td>';
//                 }
//                 else if($column == "Historique"){
//                     $html .= '<td>' . $agent->Historique->Type_reparation . '</td>';
//                 }
//                 else {
//                     $html .= '<td>' . $agent->{$column} . '</td>';
//                 }
//             }
//             $html .= '</tr>';
//         }

//         $html .= '</table>';

//         return $html;
//     }
    
    
// }  


// namespace App\Http\Controllers\Exportation;

// use App\Http\Controllers\Controller;
// use App\Models\AgenceLocation;
// use Illuminate\Http\Request;
// use App\Models\Agent;
// use App\Models\ClientParticulier;
// use App\Models\Commercial;
// use App\Models\Contrat;
// use App\Models\Parking;
// use App\Models\Societe;
// use App\Models\Vehicule;
// use App\Models\Vidange;
// use App\Models\Assurance;
// use App\Models\Vignette;
// use App\Models\VisiteTechnique;
// use App\Models\Location; 
// use App\Models\Pneumatique;
// use App\Models\Historique;
// use App\Models\Accident;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use Dompdf\Dompdf;
// use Dompdf\Options;

// class ExportxlsxController extends Controller
// {
//     private $modelMap = [
//         "Agent" => Agent::class,
//         "Agence" => AgenceLocation::class,
//         "ClientParticulier" => ClientParticulier::class,
//         "Commercial" => Commercial::class,
//         "Contrat" => Contrat::class,
//         "Parking" => Parking::class,
//         "Societe" => Societe::class,
//         "Vehicule" => Vehicule::class,
//         "Vidange" => Vidange::class,
//         "Assurance" => Assurance::class,
//         "Vignette" => Vignette::class,
//         "VisiteTechnique" => VisiteTechnique::class,
//         "Location" => Location::class,
//         "Pneumatique" => Pneumatique::class,
//         "Historique" => Historique::class,
//         "Accident" => Accident::class
//     ];

//     public function exportAgentsXlsx(Request $request, $model)
//     {
//         $selectedColumns = $request->input('columns', []);
//         $agents = $this->retrieveModelData($model, $selectedColumns);

//         $spreadsheet = new Spreadsheet();
//         $sheet = $spreadsheet->getActiveSheet();

//         // Headers
//         $columnIndex = 1;
//         foreach ($selectedColumns as $column) {
//             $sheet->setCellValue($this->getColumnLetter($columnIndex) . '1', $column);
//             $columnIndex++;
//         }

//         // Data
//         $row = 2;
//         foreach ($agents as $agent) {
//             $columnIndex = 1;
//             foreach ($selectedColumns as $column) {
//                 $sheet->setCellValue($this->getColumnLetter($columnIndex) . $row, $this->getNestedData($agent, $column));
//                 $columnIndex++;
//             }
//             $row++;
//         }

//         // Set the filename and write to file
//         $filename = 'agents.xlsx';
//         $writer = new Xlsx($spreadsheet);
//         $writer->save($filename);

//         // Download the file
//         return response()->download($filename)->deleteFileAfterSend(true);
//     }

//     private function getColumnLetter($columnIndex)
//     {
//         return \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex);
//     }

//     private function retrieveModelData($model, $selectedColumns)
//     {
//         if (!array_key_exists($model, $this->modelMap)) {
//             return response()->json(['error' => 'Invalid model'], 400);
//         }

//         $modelClass = $this->modelMap[$model];
//         $query = $modelClass::query();

//         if (method_exists($modelClass, 'with')) {
//             $relations = array_filter($selectedColumns, fn($col) => strpos($col, '.') !== false);
//             $relations = array_map(fn($col) => explode('.', $col)[0], $relations);
//             $query = $query->with($relations);
//         }

//         return $query->get();
//     }

//     private function getNestedData($agent, $column)
//     {
//         $fields = explode('.', $column);
//         $value = $agent;

//         foreach ($fields as $field) {
//             $value = $value->$field ?? 'Information non disponible';
//         }

//         return $value;
//     }

//     public function exportAgentsPdf(Request $request, $model)
//     {
//         $selectedColumns = $request->input('columns', []);
//         $agents = $this->retrieveModelData($model, $selectedColumns);

//         $options = new Options();
//         $options->set('isHtml5ParserEnabled', true);

//         $pdf = new Dompdf($options);
//         $pdf->setPaper('A2', 'landscape');

//         $html = $this->generatePDFContent($agents, $selectedColumns);

//         $pdf->loadHtml($html);
//         $pdf->render();

//         return response($pdf->output(), 200)
//             ->header('Content-Type', 'application/pdf')
//             ->header('Content-Disposition', 'attachment; filename="agents.pdf"');
//     }

//     private function generatePDFContent($agents, $selectedColumns)
//     {
//         $html = '<style>
//                     table {
//                         border-collapse: collapse;
//                         width: 100%;
//                     }
//                     table, th, td {
//                         border: 1px solid black;
//                         padding: 4px;
//                         font-size: 10px;
//                     }
//                     @page {
//                         size: A2;
//                         margin: 0;
//                     }
//                 </style>';
//         $html .= '<table><thead><tr>';

//         foreach ($selectedColumns as $column) {
//             $html .= '<th>' . $column . '</th>';
//         }

//         $html .= '</tr></thead><tbody>';

//         foreach ($agents as $agent) {
//             $html .= '<tr>';
//             foreach ($selectedColumns as $column) {
//                 $html .= '<td>' . $this->getNestedData($agent, $column) . '</td>';
//             }
//             $html .= '</tr>';
//         }

//         $html .= '</tbody></table>';
//         return $html;
//     }

//     public function print(Request $request, $model)
//     {
//         $pdfContent = $this->generatePDFContent(
//             $this->retrieveModelData($model, $request->input('columns', [])),
//             $request->input('columns', [])
//         );

//         $dompdf = new Dompdf();
//         $dompdf->loadHtml($pdfContent);
//         $dompdf->setPaper('A2', 'landscape');
//         $dompdf->render();

//         return response()->json(['url' => 'data:application/pdf;base64,' . base64_encode($dompdf->output())]);
//     }
// }

namespace App\Http\Controllers\Exportation;

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
}

