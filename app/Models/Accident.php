<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accident extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo',
        'date_accident',
        'temps_accident',
        'lieu',
        'cout_dommage',
        'rapport_police',
        'statut_resolution',
        'id_vehicule',
        'id_location', 
        'id_assurance', 
    ];

    /**
     * Définit la relation avec la table "locations".
     */
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class,'id_vehicule');
    }
    public function location()
    {
        return $this->belongsTo(Location::class,'id_location');
    }

    public function assurance()
    {
        return $this->belongsTo(Assurance::class,'id_assurance');
    }
}

