<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Accident;

class AccidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accidents = [
            [
               
                "statut_resolution"=> "En_cours",
                "rapport_police"=> "Disponible",
                "cout_dommage"=> "200",
                "lieu"=> "Paris",
                "temps_accident"=> "14:30",
                "date_accident"=> "2024-06-01",
                "photo"=> "url_de_la_photo",
                "id_assurance" => 1,
                "id_location" => 1,
                "id_vehicule" => 1,
            ],
            [
                "statut_resolution"=> "Résolu",
                "rapport_police"=> "Indisponible",
                "cout_dommage"=> "150",
                "lieu"=> "Lyon",
                "temps_accident"=> "09:00",
                "date_accident"=> "2024-05-15",
                "photo"=> "url_de_la_photo_2",
                "id_assurance"=> 2,
                "id_location"=> 2,
                "id_vehicule"=> 2
            ],
            [
                "statut_resolution"=> "En_attente",
                "rapport_police"=> "Disponible",
                "cout_dommage"=> "300",
                "lieu"=> "Marseille",
                "temps_accident"=> "18:45",
                "date_accident"=> "2024-04-20",
                "photo"=> "url_de_la_photo_3",
                "id_assurance"=> 3,
                "id_location"=> 3,
                "id_vehicule"=> 3
            ],
          
            
           
          
         
          
          
        ];

        // Vérifier si la classe Societe existe avant de créer les instances
        if (class_exists(Accident::class)) {
            foreach ($accidents as $accidents) {
                Accident::create($accidents);
            }
        } else {
            // Gérer l'absence de la classe Societe
            echo "La classe Accident n'existe pas.";
        }
    }
}