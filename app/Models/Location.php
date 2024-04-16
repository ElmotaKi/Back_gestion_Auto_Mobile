<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function clientParticulier()
    {
        return $this->belongsTo(ClientParticulier::class);
    }

    public function societe()
    {
        return $this->belongsTo(Societe::class);
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
        return $this->hasMany(Vehicule::class);
    }
}
