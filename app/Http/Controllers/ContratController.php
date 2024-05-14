<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contrat\StoreContratRequest;
use App\Http\Requests\Contrat\UpdateContratRequest;
use App\Http\Requests\ContratRequest;
use App\Models\Contrat;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $Contrats = Contrat::all();
            return response()->json([ $Contrats], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while fetching Contract ', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContratRequest $request)
    {
        try {
            $validatedData = $request->validate($request->rules());
            $Contrat = Contrat::create($validatedData);
            return response()->json(['Contrat' => $Contrat], 201);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error creating contract', 'error' => $e->getMessage()], 500);
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
            $Contrat = Contrat::findOrFail($id);
            return response()->json(['Contrat' => $Contrat], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'contract not found', 'error' => $e->getMessage()], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContratRequest $request, string $id)
    {
        try {
            $Contrat = Contrat::findOrFail($id);
            $validatedData = $request->validate($request->rules());
            $Contrat->update($validatedData);
            return response()->json(['Contrat' => $Contrat], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error updating contract', 'error' => $e->getMessage()], 500);
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
            $Contrat = Contrat::findOrFail($id);
            $Contrat->delete();
            return response()->json(['message' => 'Agency deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting the contract', 'error' => $e->getMessage()], 500);
        }
    }
}
