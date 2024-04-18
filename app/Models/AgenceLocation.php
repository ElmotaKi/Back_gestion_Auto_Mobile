<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgenceLocation extends Model
{
    use HasFactory;
    protected $fillable = ['NomAgence', 'AdresseAgence', 'VilleAgence', 'CodePostalAgence', 'TelAgence', 'EmailAgence'];
    public function agents()
    {
        return $this->hasMany(Agent::class);
    }

    public function vehicules()
    {
        return $this->hasMany(Vehicule::class);
    }
}
