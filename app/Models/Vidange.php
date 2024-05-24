<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vidange extends Model
{
    protected $fillable = [
        'DateVidange',
        'TypeVidange',
        'DureeDeVidange',
        'Cout',
        'KilometrageDerniereVidange',
        'id_vehicule', 
    ];  public $timestamps=false;
    use HasFactory;
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class,'id_vehicule');
    }
}
