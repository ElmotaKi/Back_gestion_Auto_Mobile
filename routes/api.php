<?php

use App\Http\Controllers\AgenceLocationController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\AssuranceController;

use App\Http\Controllers\DashController;
use App\Http\Controllers\Exportation\ExportxlsxController;

use App\Http\Controllers\ParkingController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\VidangeController;
use App\Http\Controllers\VisiteTechniqueController;
use App\Http\Controllers\VignetteController;
use App\Http\Controllers\ClientParticulierController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\pneumatiqueController;
use App\Http\Controllers\HistoriqueController;
use App\Http\Controllers\AccidentController;
// use App\Http\Controllers\Exportation\ExportxlsxController;
use App\Models\Location;
use App\Models\Pneumatique;
use App\Models\Parking;
use App\Models\Vehicule;
use App\Models\Vidange;
use App\Models\Vignette;
use App\Models\Assurance;
use App\Models\Contrat;
use App\Models\ClientParticulier;
use App\Models\Societe;
use App\Models\Commercial;
use App\Models\Accident;
use App\Models\Historique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    
    "parkings"=>ParkingController::class,
    "agences"=>AgenceLocationController::class,
    "agents"=>AgentController::class,
    "vehicules"=>VehiculeController::class,
    "vidanges"=>VidangeController::class,
    "vignettes"=>VignetteController::class,
    "assurances"=>AssuranceController::class,
    "visiteTechnique"=>VisiteTechniqueController::class,
    "societes"=>SocieteController::class,
    "commercials"=>CommercialController::class,
    "ClientParticuliers"=>ClientParticulierController::class,
    "Contrats"=>ContratController::class,
    "locations"=>LocationController::class,
    "pneumatiques"=>pneumatiqueController::class,
    "historiques"=>HistoriqueController::class,
    "accidents"=>AccidentController::class
]);


Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::middleware('auth:sanctum')->post('/auth/logout', [AuthController::class, 'logoutUser']);


Route::post('/exportxlsx/{model}', [ExportxlsxController::class, 'exportAgentsXlsx'])->name('exportxlsx');
Route::post('/exportpdf/{model}', [ExportxlsxController::class, 'exportAgentspdf'])->name('exportpdf');
Route::post('/print/{model}', [ExportxlsxController::class, 'print'])->name('print');
Route::post('/printContrat', [ExportxlsxController::class, 'printContrat']);
Route::post('/printContratWord', [ExportxlsxController::class, 'printContratWord']);
//les route de dashbord
Route::get('/nbrclient', [\App\Http\Controllers\Dashbord\DashController::class, 'nbrClient'])->name('nbrclient');
Route::get('/nbragent', [\App\Http\Controllers\Dashbord\DashController::class, 'nbragent'])->name('nbragent');
Route::get('/nbrparking', [\App\Http\Controllers\Dashbord\DashController::class, 'nbrParking'])->name('nbrparking');
Route::get('/nbrvoi', [\App\Http\Controllers\Dashbord\DashController::class, 'nbrVoit'])->name('nbrvoi');




