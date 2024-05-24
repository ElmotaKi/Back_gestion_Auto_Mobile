<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiteTechnique extends Model
{
    protected $fillable = [
        'DateVisite',
        'TypeVisite',
        'resultat',
        'DateExpirationVisiteTechnique',
        'id_vehicule', 
    ];  public $timestamps=false;
    use HasFactory;
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class,'id_vehicule');
    }
}
