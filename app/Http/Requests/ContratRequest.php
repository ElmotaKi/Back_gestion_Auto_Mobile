<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratRequest extends FormRequest
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
                'nomContrat' => 'required|string|max:50',
                'typeContrat' => 'required|string|max:50',
                'descriptionContrat' => 'required|string|max:255'
         
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            return [
                // Ajoutez ici les règles de validation pour les champs de mise à jour
                'nomContrat' => 'string|max:100',
                'typeContrat' => 'string|max:50',
                'descriptionContrat' => 'string|max:255'
           
            ];
        }

        return [];
    }
}
