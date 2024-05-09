<?php

use App\Http\Controllers\AgenceLocationController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CommercialController;
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
Route::post('/exportxlsx/{model}', [ExportxlsxController::class, 'exportAgentsXlsx'])->name('exportxlsx');
Route::post('/exportpdf/{model}', [ExportxlsxController::class, 'exportAgentspdf'])->name('exportpdf');
Route::post('/print/{model}', [ExportxlsxController::class, 'print'])->name('print');

// Route::get('/export', [ExportxlsxController::class, 'exportAgents'])->name('export');




// Route::get('/csrf-cookie', function (Request $request) {
//     return response()->json(['csrf_token' => csrf_token()]);
// });
