<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoriqueRequest extends FormRequest
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
                'Date_reparation'=>'required',
                'Type_reparation'=>'required',
                'cout'=>'required',
                'kilometrage'=>'required',
                'Etat_Pneu_Avant'=>'required',
                'Etat_Pneu_Apres'=>'required',
                'id_vehicule'=>'required',
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            return [
                // Ajoutez ici les règles de validation pour les champs de mise à jour
                'Date_reparation'=>'sometimes',
                'Type_reparation'=>'sometimes',
                'cout'=>'sometimes',
                'kilometrage'=>'sometimes',
                'Etat_Pneu_Avant'=>'sometimes',
                'Etat_Pneu_Apres'=>'sometimes',
                'id_vehicule'=>'sometimes',
            ];
        }

        return [];
    }
}
