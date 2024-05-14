<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientParticulierRequest extends FormRequest
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
                'Nom' => 'required|string|max:50',
                'Prenom' => 'required|string|max:100',
                'Sexe' => 'required|in:Masculin,Feminin',
                'DateNaissance' => 'required|date|max:50',
                'Tel' => 'required|string|max:20',
                'Email' => 'required|string|email|max:255',
                'Adresse' => 'required|string|max:100',
                'Ville' => 'required|string|max:100',
                'CodePostal' => 'required|string|max:100',
                'CIN' => 'required|string|max:10',
                'DateValidCIN' => 'required|date|max:50',
                'NumeroPermis' => 'required|string|max:20',
                'TypePermis' => 'required|string|max:50',
                'NumeroPasseport' => 'required|string|max:50',
                'TypePassport' => 'required|string|max:50',
                'DateFinPassport' => 'required|date|max:50',
                'AdresseEtrangere' => 'required|string|max:100'
           
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            return [
                // Ajoutez ici les règles de validation pour les champs de mise à jour
                'Nom' => 'string|max:50',
                'Prenom' => 'string|max:100',
                'Sexe' => 're1quired',
                'DateNaissance' => 'string|max:50',
                'Tel' => 'string|max:20',
                'Email' => 'string|email|max:255',
                'Adresse' => 'string|max:100',
                'Ville' => 'string|max:100',
                'CodePostal' => 'string|max:100',
                'CIN' => 'string|max:10',
                'DateValidCIN' => 'string|max:50',
                'NumeroPermis' => 'string|max:20',
                'TypePermis' => 'string|max:50',
                'NumeroPassport' => 'string|max:50',
                'TypePassport' => 'string|max:50',
                'DateFinPassport' => 'string|max:50',
                'AdresseEtrangere' => 'string|max:100'
            
            ];
        }

        return [];
    }
}
