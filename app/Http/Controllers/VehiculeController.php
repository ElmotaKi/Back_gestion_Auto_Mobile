<?php



namespace App\Http\Controllers;

use App\Http\Requests\Vehicule\StoreVehiculeRequest;
use App\Http\Requests\Vehicule\UpdateVehiculeRequest;
use App\Http\Requests\VehiculeRequest;
use Illuminate\Database\QueryException;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Fascades\Log;
class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $vehicules = Vehicule::with("agenceLocation", "parking")->get();
            return response()->json([ $vehicules], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while fetching  vehicule', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculeRequest $request)
    {
        try {
            $validatedData = $request->validate($request->rules());
            $Vehicule = Vehicule::create($validatedData);
            return response()->json(['Vehicule' => $Vehicule], 201);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error creating Vehicule', 'error' => $e->getMessage()], 500);
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
          
            $Vehicule  = Vehicule::findOrFail($id);
            return response()->json(['Vehicule' => $Vehicule], 200);
            } catch (\Exception $e) {
            return response()->json(['message' => 'individual client not found', 'error' => $e->getMessage()], 404);
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehiculeRequest $request, string $id)
    {
        try {
            $Vehicule = Vehicule::findOrFail($id);
            $validatedData = $request->validate($request->rules());
            $Vehicule->update($validatedData);
            return response()->json(['Vehicule' => $Vehicule], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error updating individual Vehicule', 'error' => $e->getMessage()], 500);
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
            $Vehicule = Vehicule::findOrFail($id);
            $Vehicule->delete();
            return response()->json(['message' => ' Vehicule deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting Vehicule', 'error' => $e->getMessage()], 500);
        }
    }
}