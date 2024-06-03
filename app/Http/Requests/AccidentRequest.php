<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccidentRequest extends FormRequest
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
                'photo' => 'required|string',
                'date_accident'  => 'required|date',
                'temps_accident' => 'required|string',
                'lieu' => 'required|string',
                'cout_dommage' => 'required|numeric',
                'statut_resolution' =>  'required|in:En_cours,Résolu,En_attente',
                'rapport_police' => 'required|string',
                'id_vehicule' => 'required|numeric',
                'id_location' =>  'required|numeric',
                'id_assurance' => 'required|numeric',
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            return [
                // Ajoutez ici les règles de validation pour les champs de mise à jour
                'photo' => 'string',
                'date_accident'  => 'date',
                'temps_accident' => 'string',
                'lieu' => 'string',
                'cout_dommage' => 'numeric',
                'rapport_police' => 'string',
                'statut_resolution' =>  'in:En_cours,Résolu,En_attente',
                'id_vehicule' => 'numeric',
                'id_location' =>  'numeric',
                'id_assurance' => 'numeric',
            ];
        }

        return [];
    }
}