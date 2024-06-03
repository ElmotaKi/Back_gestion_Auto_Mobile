<?php

namespace App\Http\Controllers;

use App\Http\Requests\Location\StoreLocationRequest;
use App\Http\Requests\Location\UpdateLocationRequest;
use App\Http\Requests\LocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $locations = Location::with("vehicules", "agent","clientparticulier","societe","contrat")->get();
            return response()->json([ $locations], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while fetching  location', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request)
    {
        try {
            $validatedData = $request->validate($request->rules());
            $Location = Location::create($validatedData);
            return response()->json(['Location' => $Location], 201);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error creating Location', 'error' => $e->getMessage()], 500);
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
          
            $Location  = Location::findOrFail($id);
            return response()->json(['Location' => $Location], 200);
            } catch (\Exception $e) {
            return response()->json(['message' => 'Location not found', 'error' => $e->getMessage()], 404);
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request, string $id)
    {
        try {
            $Location = Location::findOrFail($id);
            $validatedData = $request->validate($request->rules());
            $Location->update($validatedData);
            return response()->json(['Location' => $Location], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error updating Location', 'error' => $e->getMessage()], 500);
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
            $Location = Location::findOrFail($id);
            $Location->delete();
            return response()->json(['message' => ' Location deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting Location', 'error' => $e->getMessage()], 500);
        }
    }
}
