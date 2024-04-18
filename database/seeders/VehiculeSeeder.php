<?php

namespace Database\Seeders;

use App\Models\Vehicule;
use Illuminate\Database\Seeder;

class VehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicules = [
            [
                'Marque' => 'Toyota',
                'Model' => 'Corolla',
                'Categorie' => 'Sedan',
                'Kilometrage' => 50000.25,
                'Pneumatique' => 'Michelin',
                'NumeroDechassis' => '12345678901234567',
                'Immatriculation' => 'ABC123',
                'DateD_achat' => '2022-01-15',
                'numeroDePlace' => 5,
                'Disponibilité' => true,
                'jourTitulaire' => '2022-01-15',
                'Montant' => 20000.00,
                'MontantRestantApayer' => 5000.00,
                'ImageVoiture' => 'chemin/vers/image.jpg',
                'typeBoiteVitesse' => 'automatique',
                'annee' => 2022,
                'placeAssure' => 4,
                'typeCarburant' => 'essence',
                'id_agence' => 1, // Remplacez 1 par l'ID de l'agence associée
                'id_parking' => 1, // Remplacez 1 par l'ID du parking associé
            ],
            
        ];

        foreach ($vehicules as $vehicule) {
            Vehicule::create($vehicule);
        }
    }
}

