<?php

namespace App\Http\Controllers;

use App\Http\Requests\Assurance\StoreAssuranceRequest;
use App\Http\Requests\Assurance\UpdateAssuranceRequest;
use App\Http\Requests\AssuranceRequest;
use App\Models\Assurance;
use Illuminate\Http\Request;

class AssuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $assurance = Assurance::with("vehicule")->get();
        return response()->json($assurance, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssuranceRequest $request)
    {
        //
        try {
            $validatedData = $request->validate($request->rules());
            $assurance = Assurance::create($validatedData);
            return response()->json(['assurance' =>   $assurance], 201);
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
           
            $assurance=Assurance::findOrFail($id);
             $assuranceData = [
                'id' => $assurance->id,
                'type_assurance' => $assurance->designation,
                'date_assurance' => $assurance->status,
                'date_expiration_assurance' => $assurance->date_vignette,
                'id_vehicule_' => $assurance->id_vehicule,
               
            ];
            return response()->json($assuranceData, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'assurance not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssuranceRequest $request, string $id)
    {
        //
        try{  $assurance = Assurance::findOrFail($id);
            $validatedData = $request->validate($request->rules());
            $assurance->update($validatedData);
            return response()->json(['assurance' => $assurance], 200);
        } catch (QueryException $e) {
            return response()->json(['assurance' => 'Error updating vidange', 'error' => $e->getMessage()], 500);
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
            $assurance = Assurance::findOrFail($id);
            $assurance->delete();
            return response()->json(['message' => 'assurance deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting the assurance', 'error' => $e->getMessage()], 500);
        }
    }
}
