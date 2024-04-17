<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgenceLocation\StoreAgenceLocationRequest;
use App\Http\Requests\AgenceLocation\UpdateAgenceLocationRequest;
use App\Http\Requests\AgenceLocationRequest;
use App\Models\AgenceLocation;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AgenceLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $agences = AgenceLocation::all();
            return response()->json(['agences' => $agences], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while fetching agencies', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgenceLocationRequest $request)
    {
        try {
            $validatedData = $request->validate($request->rules());
            $agence = AgenceLocation::create($validatedData);
            return response()->json(['agence' => $agence], 201);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error creating agence', 'error' => $e->getMessage()], 500);
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
            $agence = AgenceLocation::findOrFail($id);
            return response()->json(['agence' => $agence], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Agence not found', 'error' => $e->getMessage()], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgenceLocationRequest $request, string $id)
    {
        try {
            $agence = AgenceLocation::findOrFail($id);
            $validatedData = $request->validate($request->rules());
            $agence->update($validatedData);
            return response()->json(['agence' => $agence], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error updating agence', 'error' => $e->getMessage()], 500);
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
            $agence = AgenceLocation::findOrFail($id);
            $agence->delete();
            return response()->json(['message' => 'Agency deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting the agency', 'error' => $e->getMessage()], 500);
        }
    }
}
