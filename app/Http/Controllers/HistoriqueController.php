<?php

namespace App\Http\Controllers;

use App\Http\Requests\Alerte\StoreHistoriqueRequest;
use App\Http\Requests\Alerte\UpdateHistoriqueeRequest;
use App\Http\Requests\HistoriqueRequest;
use Illuminate\Http\Request;
use App\Models\Vehicule;
use App\Models\Historique;
class HistoriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $historique = Historique::with("vehicule")->get();
        return response()->json($historique, 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HistoriqueRequest $request)
    {
        //
        try {
            $validatedData = $request->validate($request->rules());
            $historique = Historique::create($validatedData);
            return response()->json(['historique' =>   $historique], 201);
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
           
            $historique=Historique::findOrFail($id);
             $historiqueData = [
                'id' => $historique->id,
                'Date_reparation' => $historique->Date_reparation,
                'Type_reparation' => $historique->Type_reparation,
                'cout' => $historique->cout,
                'kilometrage' => $historique->kilometrage,
                'Etat_Pneu_Avant' => $historique->Etat_Pneu_Avant,
                'Etat_Pneu_Apres' => $historique->Etat_Pneu_Apres,
                'id_vehicule' => $historique->id_vehicule,
                'Immatriculation' => $historique->vehicule->Immatriculation
            ];
            return response()->json($historiqueData, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'pneumatique not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HistoriqueRequest $request, string $id)
    {
        //
        try {
            $historique = Historique::findOrFail($id);
            $validatedData = $request->validate($request->rules());
            $historique->update($validatedData);
            return response()->json(['Historique' => $historique], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error updating individual Vehicule', 'error' => $e->getMessage()], 500);
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
            $historique = Historique::findOrFail($id);
            $historique->delete();
            return response()->json(['message' => ' historique deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting Vehicule', 'error' => $e->getMessage()], 500);
        }
    }
}
