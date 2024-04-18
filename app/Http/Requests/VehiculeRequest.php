<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->isMethod('post')) {
            // Règles de validation pour la création
            return [
                'Marque' => 'required',
                'Location' => 'required',
                'NumeroDechassis' => 'required',
                'demander' => 'required',
                'Contrat' => 'required',
                'Immatriculation' => 'required|unique:vehicules',
                'DataDachat' => 'required',
                'numeroDePlace' => 'required',
                'Disponibilite' => 'required',
                'jourTitulaire' => 'required',
                'Montant' => 'required',
                'MontantRastantApayet' => 'required',
                'Vidange' => 'required',
                'Users' => 'required',
                'Vignette' => 'required',
                'AgenceLocation' => 'required',
                'UtilisationVehicule' => 'required',
                'Agent' => 'required',
                'Assurance' => 'required',
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            $id = $this->route('vehicule');
            return [
                'Marque' => '',
                'Location' => '',
                'NumeroDechassis' => '',
                'demander' => '',
                'Contrat' => '',
                'Immatriculation' => '|unique:vehicules,Immatriculation,' . $id,
                'DataDachat' => '',
                'numeroDePlace' => '',
                'Disponibilite' => '',
                'jourTitulaire' => '',
                'Montant' => '',
                'MontantRastantApayet' => '',
                'Vidange' => '',
                'Users' => '',
                'Vignette' => '',
                'AgenceLocation' => '',
                'UtilisationVehicule' => '',
                'Agent' => '',
                'Assurance' => '',
            ];
        }

        return [];
    }
}
