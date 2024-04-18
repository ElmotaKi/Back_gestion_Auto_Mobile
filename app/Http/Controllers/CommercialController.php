<?php

namespace App\Http\Controllers;

use App\Http\Requests\Commercial\StoreCommercialRequest;
use App\Http\Requests\Commercial\UpdateCommercialRequest;
use App\Http\Requests\CommercialRequest;
use Illuminate\Http\Request;
use App\Models\Commercial;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class CommercialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commercials = Commercial::all();
        return response()->json($commercials, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommercialRequest $request)
    {
        $inputsData=$request->validate($request->rules());
        $commercial=Commercial::create($inputsData);
        return response()->json($commercial);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $commercial = Commercial::find($id);

    
        if (!$commercial) {
            return response()->json(['error' => 'Commercial not found'], 404);
        }

        return response()->json($commercial, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommercialRequest $request, string $id)
    {   $commercial = Commercial::findOrFail($id);
        $inputsData=$request->validate($request->rules());
        $commercial = Commercial::update($inputsData);
        return response()->json($commercial);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $commercial = Commercial::findOrFail($id);
            $commercial->delete();

            return response()->json(['message' => 'Commercial deleted successfully'], 200);
        }   catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        } 
    }
}
