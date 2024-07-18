<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pneumatique;
use App\Models\Vehicule;

class PneumatiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pneumatiqueData = [
            [
                'Marque_Pneu' => 'Michelin',
                'Modele_Pneu' => 'PilotSport4',
                'Dimension_Pneu' => '225/45R17',
                'Type_Pneu' => 'Été',
                'Position_Pneu' => 'Avant_Gauche',
                'Etat_Pneu' => 'Bon',
                'Date_Verification' => '2024-03-15',
                'Date_Installation' => '2024-01-10',
                // 'Date_Changement'=> '' ,
                'kilometrage_Verification' => '50000',
                'kilometrage_Installation' => '52000',
                'kilometrage_Final' => '70000',
                'Historique_Reparations' => 'Aucune',
                'id_vehicule' => '1',
                'Date_Fin_Pneu' => '2025-01-10'   
            ],
            [
                'Marque_Pneu'=> 'Bridgestone',
                'Modele_Pneu'=>'TuranzaT005',
                 'Dimension_Pneu'=>'195/65R15',
                 'Type_Pneu'=> 'ToutesSaisons',
                 'Position_Pneu'=> 'ArrièreDroit',
                 'Etat_Pneu'=> 'Usé',
                 'Date_Verification'=> '2024-04-10',
                 'Date_Installation'=> '2023-09-20',
                 'Date_Changement'=> '2024-03-25' ,
                 'kilometrage_Verification'=> '47000',
                 'kilometrage_Installation'=> '45000',
                 'kilometrage_Final'=>'70000',
                 'Historique_Reparations'=> 'Réparation_crevaison_le_2024-01-15',
                 'id_vehicule'=> '2',
                 'Date_Fin_Pneu' => '2024-06-06'
            ],
            [
                'Marque_Pneu'=> 'Goodyear',
                'Modele_Pneu'=> 'Eagle_F1_Asymmetric 5',
                'Dimension_Pneu'=> '205/55R16',
                'Type_Pneu'=> 'Toutes_Saisons',
                'Position_Pneu'=> 'Arrière_Gauche',
                'Etat_Pneu'=> 'Neuf',
                'Date_Verification'=> '2024-06-10',
                'Date_Installation'=> '2024-02-25',
                'Date_Changement'=> '2024-03-25' ,
                'kilometrage_Verification'=> '32000',
                'kilometrage_Installation'=> '30000',
                'kilometrage_Final'=>'70000',
                'Historique_Reparations'=> 'Remplacement_de_valve_le_2024-05-01',
                'id_vehicule'=> '3',
                'Date_Fin_Pneu' => '2025-07-10'
            ],
            
           
         
          
          
        ];

        // Vérifier si la classe Societe existe avant de créer les instances
        if (class_exists(Pneumatique::class)) {
            foreach ($pneumatiqueData as $pneumatiqueData) {
                Pneumatique::create($pneumatiqueData);
            }
        } else {
            // Gérer l'absence de la classe Societe
            echo "La classe pneumatique n'existe pas.";
        }
    }
}