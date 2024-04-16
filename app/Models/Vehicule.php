<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    public function agenceLocation()
    {
        return $this->belongsTo(AgenceLocation::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function parking()
    {
        return $this->belongsTo(Parking::class);
    }

    public function visiteTechniques()
    {
        return $this->hasMany(VisiteTechnique::class);
    }

    public function vignettes()
    {
        return $this->hasMany(Vignette::class);
    }

    public function alertes()
    {
        return $this->hasMany(Alerte::class);
    }

    public function assurances()
    {
        return $this->hasMany(Assurance::class);
    }

    public function vidanges()
    {
        return $this->hasMany(Vidange::class);
    }

    public function utilisationsVehicules()
    {
        return $this->hasMany(UtilisationVehicule::class);
    }
}
