<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'dateDebutLocation',
  'dateFinLocation',
  'Contrat',
  'NbrJours',
  'Montant',
  'status',
  'DateRetourPrevue',
  'DateRetourVoiture',
  'KilometrageAvant',
  'KilometrageApres',
  'ImageApres',
  'ImageAvant',
    'id_societe',
    'id_agent',
    'id_clientParticulier',
    'id_vehicule',
    'id_contrat',
    ];
    use HasFactory;

    public function contrat(){
        return $this->belongsTo(contrat::class,'id_contrat');
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class,'id_agent');
    }

    public function clientParticulier()
    {
        return $this->belongsTo(ClientParticulier::class,'id_clientParticulier');
    }

    public function societe()
    {
        return $this->belongsTo(Societe::class,'id_societe');
    }

    public function documentsLocations()
    {
        return $this->hasMany(DocumentsLocation::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

    public function vehicules()
    {
        return $this->belongsTo(Vehicule::class,'id_vehicule');
    }
}
