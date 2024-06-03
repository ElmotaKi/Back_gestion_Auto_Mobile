<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pneumatique\StorePneumatiqueRequest;
use App\Http\Requests\Pneumatique\UpdatePneumatiqueRequest;
use App\Http\Requests\PneumatiqueRequest;
use App\Models\Pneumatique;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class PneumatiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pneumatique = Pneumatique::with("vehicule")->get();
        return response()->json($pneumatique, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PneumatiqueRequest $request)
    {
        //
        try {
            $validatedData = $request->validate($request->rules());
            $pneumatique = Pneumatique::create($validatedData);
            return response()->json(['pneumatique' =>   $pneumatique], 201);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error creating assurance', 'error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Validation error', 'error' => $e->getMessage()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
           
            $pneumatique=Pneumatique::findOrFail($id);
             $pneumatiqueData = [
                'id' => $pneumatique->id,
                'Marque_Pneu' => $pneumatique->Marque_Pneu,
                'Modele_Pneu' => $pneumatique->Modèle_Pneu,
                'Dimension_Pneu' => $pneumatique->Dimension_Pneu,
                'Type_Pneu' => $pneumatique->Type_Pneu,
                'Position_Pneu' => $pneumatique->Position_Pneu,
                'Etat_Pneu' => $pneumatique->État_Pneu,
                'Date_Verification' => $pneumatique->Date_Vérification,
                'Date_Installation' => $pneumatique->Date_Installation,
                'Date_Changement'=> $pneumatique->Date_Changement,
                'kilometrage_Verification' => $pneumatique->kilometrage_Verification,
                'kilometrage_Installation' => $pneumatique->kilometrage_Installation,
                'kilometrage_Final'=>$pneumatique->kilometrage_Final,
                'Historique_Reparations' => $pneumatique->Historique_Reparations,
                'id_vehicule' => $pneumatique->id_vehicule,
                'Immatriculation' => $pneumatique->vehicule->Immatriculation
            ];
            return response()->json($pneumatiqueData, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'pneumatique not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(PneumatiqueRequest $request, string $id)
    {
        //
        try{  $pneumatique = Pneumatique::findOrFail($id);
            $validatedData = $request->validate($request->rules());
            $pneumatique->update($validatedData);
            return response()->json(['pneumatique' => $pneumatique], 200);
        } catch (QueryException $e) {
            return response()->json(['pneumatique' => 'Error updating vidange', 'error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Validation error', 'error' => $e->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $pneumatique = Pneumatique::findOrFail($id);
            $pneumatique->delete();
            return response()->json(['message' => 'pneumatique deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting the pneumatique ', 'error' => $e->getMessage()], 500);
        }
    }
}
