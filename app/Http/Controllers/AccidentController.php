<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccidentRequest;
use App\Models\Accident;
use App\Models\Vehicule;
use App\Models\Location;
use App\Models\Assurance;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AccidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $accidents = Accident::with('vehicule','location','assurance')->get();
            return response()->json([$accidents], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while fetching agencies', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccidentRequest $request)
    {
        try {
            $validatedData = $request->validate($request->rules());
            $accident = Accident::create($validatedData);
            return response()->json(['accident' => $accident], 201);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error creating accident', 'error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Validation error', 'error' => $e->getMessage()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
          
            $Accident  = Accident::findOrFail($id);
            return response()->json(['Accident' => $Accident], 200);
            } catch (\Exception $e) {
            return response()->json(['message' => 'Accident not found', 'error' => $e->getMessage()], 404);
    }
    }    

    /**
     * Update the specified resource in storage.
     */
    public function update(AccidentRequest $request, string $id)
    {
        try {
            $Accident = Accident::findOrFail($id);
            $validatedData = $request->validate($request->rules());
            $Accident->update($validatedData);
            return response()->json(['Accident' => $Accident], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error updating Accident', 'error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Validation error', 'error' => $e->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $Accident = Accident::findOrFail($id);
            $Accident->delete();
            return response()->json(['message' => 'Accident deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting the Accident', 'error' => $e->getMessage()], 500);
        }
    }
}
