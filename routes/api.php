<?php

use App\Http\Controllers\AgenceLocationController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ParkingController;
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
    "agents"=>AgentController::class
]);

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

// Route::get('/csrf-cookie', function (Request $request) {
//     return response()->json(['csrf_token' => csrf_token()]);
// });
