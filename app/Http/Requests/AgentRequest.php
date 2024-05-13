<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AgentRequest extends FormRequest
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
                'NomAgent' => 'required|string|max:50',
                'PrenomAgent' => 'required|string|max:50',
                'SexeAgent' => 'required|in:Masculin,Feminin',
                'EmailAgent' => 'required|string|email|max:50|unique:agents',
                'TelAgent' => 'required|string|max:20',
                'AdresseAgent' => 'required|string|max:255',
                'VilleAgent' => 'required|string|max:50',
                'CodePostalAgent' => 'required|string|max:10',
                'id_agence' => 'required|exists:agence_locations,id'
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Règles de validation pour la mise à jour
            $agentId = $this->route('id'); 
            return [
                'NomAgent' => 'string|max:50',
                'PrenomAgent' => 'string|max:50',
                'SexeAgent' => 'in:Masculin,Feminin',
                // garantit que l'email de l'agent est unique dans la table des agents, sauf pour l'agent actuellement en cours de mise à jour.
                // 'EmailAgent' => ['string','email','max:255',Rule::unique('agents')->ignore($agentId)],
                'EmailAgent'=>['string','email','max:255'],
                'TelAgent' => 'string|max:20',
                'AdresseAgent' => 'string|max:255',
                'VilleAgent' => 'string|max:50',
                'CodePostalAgent' => 'string|max:10',
                'id_agence' => 'exists:agence_locations,id'
            ];
        }
        

        return [];
    }
}

?>