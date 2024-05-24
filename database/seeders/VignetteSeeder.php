<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vignette;

class VignetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vignetteData = [
            [
                'designation' => 'Vignette annuelle',
                'status' => 'Encours',
                'date_vignette' => '2024-01-01',
                'date_expiration_vignette' => '2025-01-01',
                'id_vehicule' => 1, // ID du premier véhicule
                
            ],
            [
                'designation' => 'Vignette annuelle',
                'status' => 'Encours',
                'date_vignette' => '2024-07-01',
                'date_expiration_vignette' => '2025-08-01',
                'id_vehicule' => 2, // ID du premier véhicule
                
            ],
            [
                'designation' => 'Vignette annuelle',
                'status' => 'Encours',
                'date_vignette' => '2024-09-01',
                'date_expiration_vignette' => '2025-06-01',
                'id_vehicule' => 3, // ID du premier véhicule
                
            ],
           
           
         
          
          
        ];

        // Vérifier si la classe Societe existe avant de créer les instances
        if (class_exists(Vignette::class)) {
            foreach ($vignetteData as $vignetteData) {
                vignette::create($vignetteData);
            }
        } else {
            // Gérer l'absence de la classe Societe
            echo "La classe VisiteTechnique n'existe pas.";
        }
    }
}
