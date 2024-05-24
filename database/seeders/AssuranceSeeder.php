<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assurance;

class AssuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assuranceData = [
            [
                'type_assurance' => 'FullCoverage',
                'date_assurance' => '2022-05-15',
                'date_expiration_assurance' => '2023-05-15',
                'id_vehicule' => '1',   
            ],
            [
                'type_assurance' => 'ThirdParty',
                'date_assurance' => '2023-01-10',
                'date_expiration_assurance' => '2024-01-10',
                'id_vehicule' => '2',
            ],
            [
                'type_assurance' => 'FullCoverage',
                'date_assurance' => '2023-03-25',
                'date_expiration_assurance' => '2024-03-25',
                'id_vehicule' => '3',
            ],
            
           
         
          
          
        ];

        // Vérifier si la classe Societe existe avant de créer les instances
        if (class_exists(Assurance::class)) {
            foreach ($assuranceData as $assuranceData) {
                assurance::create($assuranceData);
            }
        } else {
            // Gérer l'absence de la classe Societe
            echo "La classe VisiteTechnique n'existe pas.";
        }
    }
}