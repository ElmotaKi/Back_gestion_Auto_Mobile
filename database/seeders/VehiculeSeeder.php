<?php
namespace Database\Seeders;

use App\Models\Vehicule;
use App\Controllers\VehiculeController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'Disponibilité' => 'oui',
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
            [
                
                    'Marque' => 'Honda',
                    'Model' => 'Civic',
                    'Categorie' => 'Compact',
                    'Kilometrage' => 35000.75,
                    'Pneumatique' => 'Bridgestone',
                    'NumeroDechassis' => '98765432109876543',
                    'Immatriculation' => 'XYZ456',
                    'DateD_achat' => '2023-05-20',
                    'numeroDePlace' => 3,
                    'Disponibilité' => 'non',
                    'jourTitulaire' => '2023-05-20',
                    'Montant' => 18000.00,
                    'MontantRestantApayer' => 2000.00,
                    'ImageVoiture' => 'chemin/vers/image2.jpg',
                    'typeBoiteVitesse' => 'manuelle',
                    'annee' => 2023,
                    'placeAssure' => 5,
                    'typeCarburant' => 'essence',
                    'id_agence' => 2, // Remplacez 2 par l'ID de l'agence associée
                    'id_parking' => 2, // Remplacez 2 par l'ID du parking associé
                    
                
            ],
            [
                'Marque' => 'Ford',
                'Model' => 'F-150',
                'Categorie' => 'Pickup',
                'Kilometrage' => 75000.50,
                'Pneumatique' => 'Goodyear',
                'NumeroDechassis' => '54321098765432109',
                'Immatriculation' => 'DEF789',
                'DateD_achat' => '2021-10-10',
                'numeroDePlace' => 7,
                'Disponibilité' => 'oui',
                'jourTitulaire' => '2021-10-10',
                'Montant' => 35000.00,
                'MontantRestantApayer' => 0.00,
                'ImageVoiture' => 'chemin/vers/image3.jpg',
                'typeBoiteVitesse' => 'automatique',
                'annee' => 2021,
                'placeAssure' => 2,
                'typeCarburant' => 'diesel',
                'id_agence' => 3, // Remplacez 3 par l'ID de l'agence associée
                'id_parking' => 3, // Remplacez 3 par l'ID du parking associé
            ],
            
            
        ];

        foreach ($vehicules as $vehicule) {
            Vehicule::create($vehicule);
        }
    }
}