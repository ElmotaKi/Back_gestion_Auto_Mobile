<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    use HasFactory;
    public function commercials()
    {
        return $this->hasMany(Commercial::class);
    }
    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
    
    public function lcations()
    {
        return $this->hasMany(Location::class);
    }
    
}
