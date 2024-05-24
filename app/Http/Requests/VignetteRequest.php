<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VignetteRequest extends FormRequest
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
                'designation'=>'required',
                'status'=>'required',
                'date_vignette'=>'required',
                'date_expiration_vignette'=>'required',
                'id_vehicule'=>'numeric'
                
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            return [
                // Ajoutez ici les règles de validation pour les champs de mise à jour
                'designation'=>'sometimes',
                'status'=>'sometimes',
                'date_vignette'=>'sometimes',
                'date_expiration_vignette'=>'sometimes',
                'id_vehicule'=>'sometimes'
                
            ];
        }

        return [];
    }
}
