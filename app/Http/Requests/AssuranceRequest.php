<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssuranceRequest extends FormRequest
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
                'type_assurance' => 'required|string',
                'date_assurance' => 'required|date',
                'date_expiration_assurance' => 'required|date',
                'id_vehicule' => 'numeric',
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            return [
                // Ajoutez ici les règles de validation pour les champs de mise à jour
                'type_assurance' => 'sometimes',
                'date_assurance' => 'sometimes',
                'date_expiration_assurance' => 'sometimes',
                'id_vehicule' => 'sometimes',
            ];
        }

        return [];
    }
}
