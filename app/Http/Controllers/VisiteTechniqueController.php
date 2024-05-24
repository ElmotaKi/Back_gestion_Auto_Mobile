<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisiteTechnique\StoreVisiteTechniqueRequest;
use App\Http\Requests\VisiteTechnique\UpdateVisiteTechniqueRequest;
use App\Http\Requests\VisiteTechniqueRequest;
use App\Models\VisiteTechnique;
use Illuminate\Http\Request;

class VisiteTechniqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $visiteTechnique = VisiteTechnique::with("vehicule")->get();
        return response()->json($visiteTechnique, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VisiteTechniqueRequest $request)
    {
        //
        try {
            $validatedData = $request->validate($request->rules());
            $visiteTechnique = VisiteTechnique::create($validatedData);
            return response()->json(['VisiteTechnique' =>  $visiteTechnique], 201);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error creating VisiteTechnique', 'error' => $e->getMessage()], 500);
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
           
            $visiteTechnique=VisiteTechnique::findOrFail($id);
                $visiteTechnique_vehicule = [
                'id' => $visiteTechnique->id,
                'DateVisite' => $visiteTechnique->DateVisite,
                'TypeVisite' => $visiteTechnique->TypeVisite,
                'resultat' => $visiteTechnique->resultat,
                'DateExpirationVisiteTechnique' => $visiteTechnique->DateExpirationVisiteTechnique,
                'id_vehicule' => $visiteTechnique->id_vehicule,
                'Immatriculation' => $visiteTechnique->vehicule->Immatriculation,
            ];
            return response()->json($visiteTechnique, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'visite Technique not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
          

    

    /**
     * Update the specified resource in storage.
     */
    public function update(VisiteTechniqueRequest $request, string $id)
    {
        //
        try {
            $visiteTechnique = VisiteTechnique::findOrFail($id);
            $validatedData = $request->validate($request->rules());
            $visiteTechnique->update($validatedData);
            return response()->json(['visiteTechnique' => $visiteTechnique], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error updating visiteTechnique', 'error' => $e->getMessage()], 500);
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
            $visiteTechnique = VisiteTechnique::findOrFail($id);
            $visiteTechnique->delete();
            return response()->json(['message' => 'VisiteTechnique deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting the visiteTechnique', 'error' => $e->getMessage()], 500);
        }
    
    }
}
