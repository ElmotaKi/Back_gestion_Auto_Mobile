<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParkingRequest extends FormRequest
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
                 'Capacite' => 'required|integer',
                 'pannes' => 'nullable|string',
                 'PlaceRestantes' => 'required|integer',
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            return [
                 'Capacite' => 'integer',
                 'pannes' => 'nullable|string',
                 'PlaceRestantes' => 'integer',
            ];
        }

        return [];
    }
}
