<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgenceLocation\StoreAgenceLocationRequest;
use App\Http\Requests\AgenceLocation\UpdateAgenceLocationRequest;
use App\Http\Requests\AgenceLocationRequest;
use Illuminate\Http\Request;

class AgenceLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgenceLocationRequest $request)
    {
        return 'ok';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( AgenceLocationRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
