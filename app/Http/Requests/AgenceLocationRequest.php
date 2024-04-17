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
                'champs_de_creation' => 'required|autre_validation',
                // Ajoutez ici les règles de validation pour les champs de création
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            return [
                'champs_de_mise_a_jour' => 'required|autre_validation',
                // Ajoutez ici les règles de validation pour les champs de mise à jour
            ];
        }

        return [];
    }
}
