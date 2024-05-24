<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vidange\StoreVidangeRequest;
use App\Http\Requests\Vidange\UpdateVidangeRequest;
use App\Http\Requests\VidangeRequest;
use App\Models\Vidange;
use Illuminate\Http\Request;

class VidangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $vidange = Vidange::with("vehicule")->get();
        return response()->json($vidange, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VidangeRequest $request)
    {
        //
        try {
            $validatedData = $request->validate($request->rules());
            $vidange = Vidange::create($validatedData);
            return response()->json(['vidange' =>  $vidange], 201);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error creating vidange', 'error' => $e->getMessage()], 500);
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
           
            $vidange=Vidange::findOrFail($id);
                $vidange_vehicule = [
                'id' => $vidange->id,
                'DateVisite' => $vidange->DateVisite,
                'DureeDeVidange' => $vidange->DureeDeVidange,
                'Cout' => $vidange->Cout,
                'KilometrageDerniereVidange' => $vidange->KilometrageDerniereVidange,
                'id_vehicule' => $vidange->id_vehicule,
                'Immatriculation' => $vidange->vehicule->Immatriculation,
            ];
            return response()->json($vidange_vehicule, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'vidange not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
          

    

    /**
     * Update the specified resource in storage.
     */
    public function update(VidangeRequest $request, string $id)
    {
        //
        try {
            $vidange = Vidange::findOrFail($id);
            $validatedData = $request->validate($request->rules());
            $vidange->update($validatedData);
            return response()->json(['vidange' => $vidange], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error updating vidange', 'error' => $e->getMessage()], 500);
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
            $vidange = Vidange::findOrFail($id);
            $vidange->delete();
            return response()->json(['message' => 'vidange deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting the vidange', 'error' => $e->getMessage()], 500);
        }
    
    }
}
