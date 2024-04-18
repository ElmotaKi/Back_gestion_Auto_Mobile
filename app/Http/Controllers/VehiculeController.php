<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehiculeRequest;
use App\Models\Vehicule;
use Illuminate\Database\QueryException;

class VehiculeController extends Controller
{
    /**
     * Afficher la liste des véhicules.
     */
    public function index()
    {
        try {
            $vehicules = Vehicule::all();
            return response()->json($vehicules, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Stocker un nouveau véhicule.
     */
    public function store(VehiculeRequest $request)
    {
        try {
            $validatedData = $request->validate($request->rules());
            $vehicule = Vehicule::create($validatedData);
            return response()->json($vehicule, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Afficher les détails d'un véhicule spécifique.
     */
    public function show(string $id)
    {
        try {
            $vehicule = Vehicule::findOrFail($id);
            return response()->json($vehicule, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Véhicule non trouvé'], 404);
        }
    }

    /**
     * Mettre à jour les détails d'un véhicule spécifique.
     */
    public function update(VehiculeRequest $request, string $id)
    {
        // try {
        //     $vehicule = Vehicule::findOrFail($id);
        //     $validatedData = $request->validate($request->rules());
        //     $vehicule->update($validatedData);
        //     return response()->json($vehicule, 200);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }
        try {
            $Vehicule = Vehicule::findOrFail($id);
            $validatedData = $request->validate($request->rules());
            $Vehicule->update($validatedData);
            return response()->json(['Vehicule' => $Vehicule], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error updating vehicule', 'error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Validation error', 'error' => $e->getMessage()], 422);
        }
    }

    /**
     * Supprimer un véhicule spécifique.
     */
    public function destroy(string $id)
    {
        try {
            $vehicule = Vehicule::findOrFail($id);
            $vehicule->delete();
            return response()->json(['message' => 'Véhicule supprimé avec succès'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
