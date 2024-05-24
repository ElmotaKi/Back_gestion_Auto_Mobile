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
           
            'DateVisite'=>'required|date',
            'TypeVisite'=>'required|string',
            'resultat'=> 'required|in:Conforme,Non_conforme,Echec',
            'DateExpirationVisiteTechnique'=>'required|date',
            'id_vehicule'=>'numeric'
           

            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            return [
                // Ajoutez ici les règles de validation pour les champs de mise à jour
                
            'DateVisite'=>'date',
            'TypeVisite'=>'string',
            'resultat'=> 'in:Conforme,Non_conforme,Echec',
            'DateExpirationVisiteTechnique'=>'date',
            'id_vehicule'=>'numeric'
            ];
        }

        return [];
    }
}

