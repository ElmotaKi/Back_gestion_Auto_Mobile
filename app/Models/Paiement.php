<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    public function clientParticulier()
    {
        return $this->belongsTo(ClientParticulier::class);
    }

    public function societe()
    {
        return $this->belongsTo(Societe::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
