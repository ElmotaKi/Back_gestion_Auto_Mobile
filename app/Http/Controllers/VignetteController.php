<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vignette\StoreVignetteRequest;
use App\Http\Requests\Vignette\UpdateVignetteRequest;
use App\Http\Requests\VignetteRequest;
use App\Models\Vignette;
use Illuminate\Http\Request;

class VignetteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $vignette = Vignette::with("vehicule")->get();
        return response()->json($vignette, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VignetteRequest $request)
    {
        //
        try {
            $validatedData = $request->validate($request->rules());
            $vignette = Vignette::create($validatedData);
            return response()->json(['vignette' =>  $vignette], 201);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error creating vignette', 'error' => $e->getMessage()], 500);
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
           
            $vignette=Vignette::findOrFail($id);
             $vignetteData = [
                'id' => $vignette->id,
                'designation' => $vignette->designation,
                'status' => $vignette->status,
                'date_vignette' => $vignette->date_vignette,
                'date_expiration_vignette' => $vignette->date_expiration_vignette,
                'id_vehicule' => $vignette->id_vehicule,
                'Immatriculation' => $vignette->vehicule->Immatriculation,
                
            ];
            return response()->json($vignetteData, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'visiteTechnique not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VignetteRequest $request, string $id)
    {
        //
      try{  $vignette = Vignette::findOrFail($id);
            $validatedData = $request->validate($request->rules());
            $vignette->update($validatedData);
            return response()->json(['vignette' => $vignette], 200);
        } catch (QueryException $e) {
            return response()->json(['visiteTechnique' => 'Error updating Vignette', 'error' => $e->getMessage()], 500);
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
            $vignette = Vignette::findOrFail($id);
            $vignette->delete();
            return response()->json(['message' => 'vignette deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting the vignette', 'error' => $e->getMessage()], 500);
        }
    
    }
}
