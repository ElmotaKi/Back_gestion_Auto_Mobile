<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisiteTechnique;

class VisiteTechniqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visiteTechniqueData = [
            [
                'DateVisite' => '2024-03-10',
                'TypeVisite' => 'Contrôle Technique',
                'resultat' => 'Conforme',
                'DateExpirationVisiteTechnique' => '2026-03-10',
                'id_vehicule' => 1, // ID du premier véhicule
                
            ],
            [
                'DateVisite' => '2024-03-10',
                'TypeVisite' => 'Contrôle Technique',
                'resultat' => 'Conforme',
                'DateExpirationVisiteTechnique' => '2027-03-10',
                'id_vehicule' => 2, // ID du premier véhicule
                
            ],

            [
                'DateVisite' => '2024-03-10',
                'TypeVisite' => 'Contrôle Technique',
                'resultat' => 'Conforme',
                'DateExpirationVisiteTechnique' => '2026-03-10',
                'id_vehicule' => 3, // ID du premier véhicule
                
            ],
           
         
          
          
        ];

        // Vérifier si la classe Societe existe avant de créer les instances
        if (class_exists(VisiteTechnique::class)) {
            foreach ($visiteTechniqueData as $visiteTechniqueData) {
                visiteTechnique::create($visiteTechniqueData);
            }
        } else {
            // Gérer l'absence de la classe Societe
            echo "La classe VisiteTechnique n'existe pas.";
        }
    }
}
