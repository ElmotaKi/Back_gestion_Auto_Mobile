<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocieteRequest extends FormRequest
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
            'RaisonSocial'=>'required',
            'ICE'=>'required',
            'NumeroCNSS'=>'required',
            'NumeroFiscale'=>'required',
            'RegistreCommercial'=>'required',
            'AdresseSociete'=>'required'

            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            return [
                'RaisonSocial'=>'',
            'ICE'=>'',
            'NumeroCNSS'=>'',
            'NumeroFiscale'=>'',
            'RegistreCommercial'=>'',
            'AdresseSociete'=>''// Ajoutez ici les règles de validation pour les champs de mise à jour
            ];
        }

    }
}
