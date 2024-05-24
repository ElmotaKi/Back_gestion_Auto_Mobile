<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vidange;

class VidangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vidangeData = [
            [
                'DateVidange' => '2024-01-20',
                'TypeVidange' => 'Standard',
                'DureeDeVidange' => '1',
                'Cout' => '50',
                'KilometrageDerniereVidange' => '15000',
                'id_vehicule' => '1',
            ],
            [
                'DateVidange' => '2024-03-15',
                'TypeVidange' => 'Full',
                'DureeDeVidange' => '2',
                'Cout' => '80',
                'KilometrageDerniereVidange' => '18000',
                'id_vehicule' => '2',
            ],
            [
                'DateVidange' => '2023-11-05',
                'TypeVidange' => 'Standard',
                'DureeDeVidange' => '1',
                'Cout' => '55',
                'KilometrageDerniereVidange' => '20000',
                'id_vehicule' => '3',
            ],
          
            
           
          
         
          
          
        ];

        // Vérifier si la classe Societe existe avant de créer les instances
        if (class_exists(Vidange::class)) {
            foreach ($vidangeData as $vidangeData) {
                Vidange::create($vidangeData);
            }
        } else {
            // Gérer l'absence de la classe Societe
            echo "La classe Vidange n'existe pas.";
        }
    }
}