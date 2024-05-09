<?php

use App\Http\Controllers\AgenceLocationController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\Exportation\ExportxlsxController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\VehiculeController;
use App\Models\Parking;
use App\Models\Vehicule;
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
    "vehicules"=>VehiculeController::class,
    "parkings"=>ParkingController::class,
    "agences"=>AgenceLocationController::class,
    "agents"=>AgentController::class,
    "societes"=>SocieteController::class,
    "commercials"=>CommercialController::class,
]);

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::middleware('auth:sanctum')->post('/auth/logout', [AuthController::class, 'logoutUser']);
//exportation des fichier

Route::post('/exportxlsx/{model}', [ExportxlsxController::class, 'exportAgentsXlsx'])->name('exportxlsx');
Route::post('/exportpdf/{model}', [ExportxlsxController::class, 'exportAgentspdf'])->name('exportpdf');
Route::post('/print/{model}', [ExportxlsxController::class, 'print'])->name('print');

//les route de dashbord
Route::get('/nbrclient', [\App\Http\Controllers\Dashbord\DashController::class, 'nbrClient'])->name('nbrclient');
Route::get('/nbragent', [\App\Http\Controllers\Dashbord\DashController::class, 'nbragent'])->name('nbragent');
Route::get('/nbrparking', [\App\Http\Controllers\Dashbord\DashController::class, 'nbrParking'])->name('nbrparking');
Route::get('/nbrvoi', [\App\Http\Controllers\Dashbord\DashController::class, 'nbrVoit'])->name('nbrvoi');




