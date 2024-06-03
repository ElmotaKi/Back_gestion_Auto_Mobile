<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Historique;
use App\Models\Vehicule;

class HistoriqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $historiqueData = [
            [
                'Date_reparation' => '2024-05-01 10:30:00',
                'Type_reparation' => 'Changement de pneu',
                'cout' => '120.50',
                'kilometrage' => '25000',
                'Etat_Pneu_Avant' => 'Usé',
                'Etat_Pneu_Apres' => 'Neuf',
                'id_vehicule' => '1',
               
            ],
            [
                'Date_reparation' => '2024-05-10 14:15:00',
                'Type_reparation' => 'Réparation de crevaison',
                'cout' => '45.00',
                'kilometrage' => '28000',
                'Etat_Pneu_Avant' => 'Endommagé',
                'Etat_Pneu_Apres' => 'Réparé',
                'id_vehicule' => '2',
                
            ],
            [
                'Date_reparation' => '2024-05-20 09:00:00',
                'Type_reparation' => 'Réalignement',
                'cout' => '80.00',
                'kilometrage' => '30000',
                'Etat_Pneu_Avant' => 'Désaligné',
                'Etat_Pneu_Apres' => 'Aligné',
                'id_vehicule' => '3',
                
            ],
            
           
         
          
          
        ];

        // Vérifier si la classe Societe existe avant de créer les instances
        if (class_exists(Historique::class)) {
            foreach ($historiqueData as $historiqueData) {
                Historique::create($historiqueData);
            }
        } else {
            // Gérer l'absence de la classe Societe
            echo "La classe historique n'existe pas.";
        }
    }
}