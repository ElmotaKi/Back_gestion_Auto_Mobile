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
                // Ajoutez ici les règles de validation pour les champs de création
                'Marque' => 'required|string',
                'Model'  => 'required|string',
                'Categorie' => 'required|string',
                'Kilometrage' => 'required|numeric',
                'Pneumatique' => 'required|string',
                'NumeroDechassis' =>  'required|string',
                'Immatriculation' => 'required|string',
                'DateD_achat' =>  'required|date',
                'numeroDePlace' => 'required|numeric',
                'Disponibilité' => 'required|in:oui,non',
                'jourTitulaire' => 'required|date',
                'Montant' => 'required|numeric',
                'MontantRestantApayer' => 'required|numeric',
                'ImageVoiture' => 'string',
                'typeBoiteVitesse' => 'required|in:manuelle,automatique',
                'annee' =>  'required|numeric',
                'placeAssure' => 'required|numeric',
                'typeCarburant' => 'required|string',
                'id_agence'=> 'required|numeric',
                'id_parking'=> 'required|numeric',
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            return [
                // Ajoutez ici les règles de validation pour les champs de mise à jour
                'Marque' => 'string',
                'Model'  => 'string',
                'Categorie' => 'string',
                'Kilometrage' => 'numeric',
                'Pneumatique' => 'string',
                'NumeroDechassis' =>  'string',
                'Immatriculation' => 'string',
                'DateD_achat' =>  'date',
                'numeroDePlace' => 'numeric',
                'Disponibilité' => 'in:oui,non',
                'jourTitulaire' => 'date',
                'Montant' => 'numeric',
                'MontantRestantApayer' => 'numeric',
                'ImageVoiture' => 'string',
                'typeBoiteVitesse' => 'in:manuelle,automatique',
                'annee' =>  'numeric',
                'placeAssure' => 'numeric',
                'typeCarburant' => 'string',
                'id_agence'=> 'numeric',
                'id_parking'=> 'numeric',
                 
            ];
        }

        return [];
    }
}