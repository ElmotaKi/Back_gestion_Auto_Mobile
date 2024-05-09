<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientParticulier extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nom',
        'Prenom',
        'sexe',
        'Email',
        'DateNaissance',
        'Tel',
        'Adresse',
        'Ville',
        'CodePostal',
        'CIN',
        'DateValidCIN',
        'NumeroPermis',
        'TypePermis',
        'NumeroPasseport',
        'TypePassport',
        'DateFinPassport',
        'AdresseEtrangere'
    ];    public $timestamps=false;
   
    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
}