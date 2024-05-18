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
                'Marque' => 'required|string|max:50',
                'Model'  => 'required|string|max:50',
                'Categorie' => 'required|string|max:50',
                'Kilometrage' => 'required|numeric',
                'Pneumatique' => 'required|string|max:50',
                'NumeroDechassis' =>  'required|string|max:50',
                'Immatriculation' => 'required|string|max:50',
                'DateD_achat' =>  'required|date|max:50',
                'numeroDePlace' => 'required|numeric',
                'Disponibilité' => 'required|in:oui,non',
                'jourTitulaire' => 'required|date|max:50',
                'Montant' => 'required|numeric',
                'MontantRestantApayer' => 'required|numeric',
                'ImageVoiture' => 'string|max:50',
                'typeBoiteVitesse' => 'required|in:manuelle,automatique',
                'annee' =>  'required|numeric',
                'placeAssure' => 'required|numeric',
                'typeCarburant' => 'required|string|max:50',
                'id_agence'=> 'required|numeric',
                'id_parking'=> 'required|numeric',
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            return [
                // Ajoutez ici les règles de validation pour les champs de mise à jour
                'Marque' => 'string|max:50',
                'Model'  => 'string|max:50',
                'Categorie' => 'string|max:50',
                'Kilometrage' => 'numeric',
                'Pneumatique' => 'string|max:50',
                'NumeroDechassis' =>  'string|max:50',
                'Immatriculation' => 'string|max:50',
                'DateD_achat' =>  'date|max:50',
                'numeroDePlace' => 'numeric',
                'Disponibilité' => 'in:oui,non',
                'jourTitulaire' => 'date|max:50',
                'Montant' => 'numeric',
                'MontantRestantApayer' => 'numeric',
                'ImageVoiture' => 'string|max:50',
                'typeBoiteVitesse' => 'in:manuelle,automatique',
                'annee' =>  'numeric',
                'placeAssure' => 'numeric',
                'typeCarburant' => 'string|max:50',
                'id_agence'=> 'numeric',
                'id_parking'=> 'numeric',
                 
            ];
        }

        return [];
    }
}