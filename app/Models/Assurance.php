<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assurance extends Model
{
    protected $fillable = [
        'type_assurance',
        'date_assurance',
        'date_expiration_assurance',
        'id_vehicule', 
    ];  public $timestamps=false;
    use HasFactory;
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class,'id_vehicule');
    }
}
