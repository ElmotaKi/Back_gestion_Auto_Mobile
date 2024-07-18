<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
                'dateDebutLocation' => 'required|date',
                'dateFinLocation' => 'required|date',
                'Contrat' => 'required|string',
                'NbrJours' => 'required|numeric',
                'Montant' => 'required|numeric',
                'MontantParJour' => 'required|numeric',
                'status' => 'required|in:terminee,encours',
                'DateRetourPrevue' => 'required|date',
                'DateRetourVoiture' => 'date',
                'KilometrageAvant' => 'required|numeric',
                'KilometrageApres' => 'numeric',
                'ImageApres' => 'string',
                'ImageAvant' => 'required|string',
                'id_vehicule' => 'required|numeric',
                'id_clientParticulier' => 'numeric',
                'id_societe' => 'numeric',
                'id_agent' => 'required|numeric',
                'id_contrat' => 'required|numeric',
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            return [
                'dateDebutLocation' => 'date',
                'dateFinLocation' => 'date',
                'Contrat' => 'string',
                'NbrJours' => 'numeric',
                'Montant' => 'numeric',
                'MontantParJour' => 'numeric',
                'status' => 'in:terminee,encours',
                'DateRetourPrevue' => 'date',
                'DateRetourVoiture' => 'date',
                'KilometrageAvant' => 'numeric',
                'KilometrageApres' => 'numeric',
                'ImageApres' => 'string',
                'ImageAvant' => 'string',
                'id_vehicule' => 'numeric',
                'id_clientParticulier' => 'numeric',
                'id_societe' => 'numeric',
                'id_agent' => 'numeric',
                'id_contrat' => 'numeric',
            ];
        }

        return [];
    }
}
