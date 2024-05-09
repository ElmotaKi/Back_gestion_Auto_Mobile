<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Models\AgenceLocation;
use App\Models\Agent;
use App\Models\ClientParticulier;
use App\Models\Parking;
use App\Models\Vehicule;

class DashController extends Controller
{
    public function nbrClient(){
        $numberOfClients = ClientParticulier::count();
        return response()->json($numberOfClients);
    }

    public function nbragent(){
        $numberOfClients = AgenceLocation::count();
        return response()->json($numberOfClients);
    }
    public function nbrParking(){
        $numberOfClients = Parking::count();
        return response()->json($numberOfClients);
    }
    public function nbrVoit(){
        $numberOfClients = Vehicule::count();
        return response()->json($numberOfClients);
    }
    // public function nbrVoitLou(){
    //     $numberOfClients = Vehicule::count();
    //     return response()->json($numberOfClients);
    // }
}
