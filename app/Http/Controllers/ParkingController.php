<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParkingRequest;
use App\Models\Parking;

class ParkingController extends Controller
{
    /**
     * Afficher la liste des parkings.
     */
    public function index()
    {
        try {
            $parkings = Parking::all();
            return response()->json($parkings, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Stocker un nouveau parking.
     */
    public function store(ParkingRequest $request)
    {
        try {
            $validatedData = $request->validate($request->rules());
            $parking = Parking::create($validatedData);
            return response()->json($parking, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Afficher les détails d'un parking spécifique.
     */
    public function show(string $id)
    {
        try {
            $parking = Parking::findOrFail($id);
            return response()->json($parking, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Parking non trouvé'], 404);
        }
    }

    /**
     * Mettre à jour les détails d'un parking spécifique.
     */
    public function update(ParkingRequest $request, string $id)
    {
        try {
            $parking = Parking::findOrFail($id);
            $validatedData = $request->validate($request->rules());
            $parking->update($validatedData);
            return response()->json($parking, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Supprimer un parking spécifique.
     */
    public function destroy(string $id)
    {
        try {
            $parking = Parking::findOrFail($id);
            $parking->delete();
            return response()->json(['message' => 'Parking supprimé avec succès'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
