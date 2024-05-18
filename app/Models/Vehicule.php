<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $fillable = [
        'Marque',
        'Model',
        'Categorie',
        'Kilometrage',
        'Pneumatique',
        'NumeroDechassis',
        'Immatriculation',
        'DateD_achat',
        'numeroDePlace',
        'Disponibilité',
        'jourTitulaire',
        'Montant',
        'MontantRestantApayer',
        'ImageVoiture',
        'typeBoiteVitesse',
        'annee',
        'placeAssure',
        'typeCarburant',
        'id_agence',
        'id_parking',
    ];
    use HasFactory;
    public function agenceLocation()
    {
        return $this->belongsTo(AgenceLocation::class,'id_agence');
    }

    public function location()
    {
        return $this->hasMany(Location::class);
    }

    public function parking()
    {
        return $this->belongsTo(Parking::class,'id_parking');
    }

    public function visiteTechniques()
    {
        return $this->hasMany(VisiteTechnique::class);
    }

    public function vignettes()
    {
        return $this->hasMany(Vignette::class);
    }

    public function alertes()
    {
        return $this->hasMany(Alerte::class);
    }

    public function assurances()
    {
        return $this->hasMany(Assurance::class);
    }

    public function vidanges()
    {
        return $this->hasMany(Vidange::class);
    }

    public function utilisationsVehicules()
    {
        return $this->hasMany(UtilisationVehicule::class);
    }
}