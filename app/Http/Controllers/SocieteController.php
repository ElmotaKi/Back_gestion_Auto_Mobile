<?php

namespace App\Http\Controllers;

use App\Http\Requests\Societe\StoreSocieteRequest;
use App\Http\Requests\Societe\UpdateSocieteRequest;
use App\Http\Requests\SocieteRequest;
use Illuminate\Http\Request;
use App\Models\Societe;

class SocieteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $societe = Societe::all();
        return response()->json($societe, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SocieteRequest $request)
    {
        //
        $formsfields=$request->validate($request->rules());
        $societe=Societe::create($formsfields);
        return response()->json($societe);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $societe= Societe::find($id);

        if (!$societe) {
            return response()->json(['error' => 'Societe not found'], 404);
        }

        return response()->json($societe, 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocieteRequest $request, string $id)
    {
        
        $societe = Societe::findOrFail($id);
        $inputsData=$request->validate($request->rules());
        $societe = Societe::update($inputsData);
        return response()->json($societe);
        if (!$societe) {
            return response()->json(['error' => 'Societe not found'], 404);
        }

       
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $societe = Societe::findOrFail($id);
            $societe->delete();

            return response()->json(['message' => 'Societe supprimée avec succès'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        } 
    }
}
