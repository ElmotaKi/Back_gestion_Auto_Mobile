<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisiteTechniqueRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->isMethod('post')) {
            return [
                // Ajoutez ici les règles de validation pour les champs de création
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            return [
                // Ajoutez ici les règles de validation pour les champs de mise à jour
            ];
        }

        return [];
    }
}
