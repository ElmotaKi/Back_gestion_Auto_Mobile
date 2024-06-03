<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PneumatiqueRequest extends FormRequest
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
                'Marque_Pneu'=>'required',
                'Modele_Pneu'=>'required',
                'Dimension_Pneu'=>'required',
                'Type_Pneu'=>'required',
                'Position_Pneu'=>'required',
                'Etat_Pneu'=>'required',
                'Date_Verification'=>'required',
                'Date_Installation'=>'required',
                'Date_Changement'=>'required',
                'kilometrage_Verification'=>'required',
                'kilometrage_Installation'=>'required',
                'kilometrage_Final'=>'required',
                'Historique_Reparations'=>'required',
                'id_vehicule' => 'numeric',
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            return [
                // Ajoutez ici les règles de validation pour les champs de mise à jour
                'Marque_Pneu'=>'sometimes',
                'Modele_Pneu'=>'sometimes',
                'Dimension_Pneu'=>'sometimes',
                'Type_Pneu'=>'sometimes',
                'Position_Pneu'=>'sometimes',
                'Etat_Pneu'=>'sometimes',
                'Date_Verification'=>'sometimes',
                'Date_Installation'=>'sometimes',
                'Date_Changement'=>'sometimes',
                'kilometrage_Verification'=>'sometimes',
                'kilometrage_Installation'=>'sometimes',
                'kilometrage_Final'=>'sometimes',
                'Historique_Reparations'=>'sometimes',
                'id_vehicule' => 'sometimes',
            ];
        }

        return [];
    }
}
