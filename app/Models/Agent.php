<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        'NomAgent',
        'PrenomAgent',
        'SexeAgent',
        'EmailAgent',
        'TelAgent',
        'AdresseAgent',
        'VilleAgent',
        'CodePostalAgent',
        'id_agence', 
    ];
    public function agenceLocation()
    {
        return $this->belongsTo(AgenceLocation::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
