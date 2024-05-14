<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientParticulier\StoreClientParticulierRequest;
use App\Http\Requests\ClientParticulier\UpdateClientParticulierRequest;
use App\Http\Requests\ClientParticulierRequest;
use Illuminate\Database\QueryException;
use App\Models\ClientParticulier;
use Illuminate\Http\Request;

class ClientParticulierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $ClientParticuliers = ClientParticulier::all();
            return response()->json([ $ClientParticuliers], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while fetching individual client', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientParticulierRequest $request)
    {
        try {
            $validatedData = $request->validate($request->rules());
            $ClientParticulier = ClientParticulier::create($validatedData);
            return response()->json(['ClientParticulier' => $ClientParticulier], 201);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error creating individual client', 'error' => $e->getMessage()], 500);
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
          
            $ClientParticulier  = ClientParticulier::findOrFail($id);
            return response()->json(['ClientParticulier' => $ClientParticulier], 200);
            } catch (\Exception $e) {
            return response()->json(['message' => 'individual client not found', 'error' => $e->getMessage()], 404);
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientParticulierRequest $request, string $id)
    {
        try {
            $ClientParticulier = ClientParticulier::findOrFail($id);
            $validatedData = $request->validate($request->rules());
            $ClientParticulier->update($validatedData);
            return response()->json(['ClientParticulier' => $ClientParticulier], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error updating individual client', 'error' => $e->getMessage()], 500);
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
            $ClientParticulier = ClientParticulier::findOrFail($id);
            $ClientParticulier->delete();
            return response()->json(['message' => 'individual client deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting the individual client', 'error' => $e->getMessage()], 500);
        }
    }
}
