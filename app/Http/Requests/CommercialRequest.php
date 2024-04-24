<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommercialRequest extends FormRequest
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
                'CIN' => 'required',
                'Nom' => 'required',
                'Prenom' => 'required',
                'Sexe' => 'required',
                'DateNaissance' => 'required',
                'Tel' => 'required',
                'Adresse' => 'required',
                'Ville' => 'required',
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            return [
                // Ajoutez ici les règles de validation pour les champs de mise à jour
                'CIN' => '',
                'Nom' => '',
                'Prenom' => '',
                'Sexe' => '',
                'DateNaissance' => '',
                'Tel' => '',
                'Adresse' => '',
                'Ville' => '',
            ];
        }

      
    }
}
