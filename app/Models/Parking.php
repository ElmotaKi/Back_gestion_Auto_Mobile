<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;
    protected $guarded=["id"];
    public function vehicules()
    {
        return $this->hasMany(Vehicule::class);
    }
}
