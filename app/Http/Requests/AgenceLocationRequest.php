<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgenceLocationRequest extends FormRequest
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
                'NomAgence' => 'required|string|max:50',
                'AdresseAgence' => 'required|string|max:100',
                'VilleAgence' => 'required|string|max:50',
                'CodePostalAgence' => 'required|string|max:50',
                'TelAgence' => 'required|string|max:20',
                'EmailAgence' => 'required|string|email|max:255|unique:agence_locations,EmailAgence',

            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            return [
                // Ajoutez ici les règles de validation pour les champs de mise à jour
                'NomAgence' => 'string|max:50',
                'AdresseAgence' => 'string|max:100',
                'VilleAgence' => 'string|max:50',
                'CodePostalAgence' => 'string|max:50',
                'TelAgence' => 'string|max:20',
                'EmailAgence' => 'string|email|max:255|unique:agence_locations,EmailAgence',
            ];
        }

        return [];
    }
}
