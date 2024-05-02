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
                'RaisonSocial' => 'required',
                'ICE' => 'required',
                'NumeroCNSS' => 'required',
                'NumeroFiscale' => 'required',
                'RegistreCommercial' => 'required',
                'AdresseSociete' => 'required'
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            return [
                'RaisonSocial' => 'sometimes',
                'ICE' => 'sometimes',
                'NumeroCNSS' => 'sometimes',
                'NumeroFiscale' => 'sometimes',
                'RegistreCommercial' => 'sometimes',
                'AdresseSociete' => 'sometimes'
            ];
        }

        return [];
    }
}
