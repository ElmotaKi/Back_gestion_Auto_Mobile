<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VidangeRequest extends FormRequest
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
           
            'DateVidange'=>'required|date',
            'TypeVidange'=>'required|string',
            'DureeDeVidange'=>'required|numeric',
            'Cout'=>'required|numeric',
            'KilometrageDerniereVidange'=>'required|numeric',
            'id_vehicule'=>'required|numeric'
           

            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            return [
                // Ajoutez ici les règles de validation pour les champs de mise à jour
                'DateVidange'=>'sometimes',
                'TypeVidange'=>'sometimes',
                'DureeDeVidange'=>'sometimes',
                'Cout'=>'sometimes',
                'KilometrageDerniereVidange'=>'sometimes',
                'id_vehicule'=>'sometimes'
            ];
        }

        return [];
    }
}
