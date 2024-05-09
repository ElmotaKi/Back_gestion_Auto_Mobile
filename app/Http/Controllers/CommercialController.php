<?php
namespace App\Http\Controllers;
use App\Http\Requests\Commercial\StoreCommercialRequest;
use App\Http\Requests\Commercial\UpdateCommercialRequest;
use App\Http\Requests\CommercialRequest;
use Illuminate\Http\Request;
use App\Models\Commercial;
use App\Models\Societe;
use Illuminate\Support\Facades\Log; // Import Log facade
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
  public function show(string $id)
    {
        try {
           
            $commercial=Commercial::findOrFail($id);
                $commercial_societe = [
                'id' => $commercial->id,
                'CIN' => $commercial->CIN,
                'Nom' => $commercial->Nom,
                'Prenom' => $commercial->Prenom,
                'Sexe' => $commercial->Sexe,
                'DateNaissance' => $commercial->DateNaissance,
                'Tel' => $commercial->Tel,
                'Adresse' => $commercial->Adresse,
                'Ville' => $commercial->Ville, 
                'id_societe' => $commercial->id_societe,
                'RaisonSocial' => $commercial->societe->RaisonSocial,
            ];
            return response()->json($commercial_societe, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Commercial not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
          

    /**
     * Update the specified resource in storage.
     */
    public function update(CommercialRequest $request, string $id)
    {
        try {
            $commercial = Commercial::findOrFail($id);
            $inputsData = $request->validate($request->rules());
            $commercial->update($inputsData);
            return response()->json($commercial);
        } catch (\Exception $e) {
            Log::error('Error in update method: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while updating the commercial.'], 500);
        }
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
        } catch (\Exception $e) {
            Log::error('Error in destroy method: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while deleting the commercial.'], 500);
        }
    }
}
