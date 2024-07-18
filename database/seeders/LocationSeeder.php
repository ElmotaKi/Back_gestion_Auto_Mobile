<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Controllers\LocationController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Location = [
            [   'dateDebutLocation' => '2024-04-15',
                'dateFinLocation' => '2024-05-15',
                'Contrat' => 'CTR20240501',
                'NbrJours' => '14',
                'Montant' => '1500',
                'status' => 'terminee',
                'DateRetourPrevue' => '2024-05-15',
                'DateRetourVoiture' => '2024-05-15',
                'KilometrageApres' => '12000',
                'KilometrageAvant' => '11500',
                'ImageAvant' => 'path/to/imageAvant.jpg',
                'ImageApres' => 'path/to/imageApres.jpg',
                'id_vehicule' => 1, 
                'id_agent' => 1, 
                'id_clientParticulier' => 1, 
                'id_societe' => 1, 
                'id_contrat' => 1,
                'MontantParJour' => 107.14 
            ],
            [
                'dateDebutLocation' => '2024-07-15',
                'dateFinLocation' => '2024-07-25',
                'Contrat' => 'CTR20240715',
                'NbrJours' => '10',
                'Montant' => '1400',
                'status' => 'terminee',
                'DateRetourPrevue' => '2024-07-25',
                'DateRetourVoiture' => '2024-07-27', 
                'KilometrageApres' => '30000', 
                'KilometrageAvant' => '15000',
                'ImageAvant' => 'path/to/imageAvant2.jpg',
                'ImageApres' => 'path/to/imageApres2.jpg',
                'id_vehicule' => 3, 
                'id_agent' => 3, 
                'id_clientParticulier' => 3, 
                'id_societe' => 3,
                'id_contrat' =>3,
                'MontantParJour' => 100 
            ],
            [
                'dateDebutLocation' => '2024-06-01',
                'dateFinLocation' => '2024-06-10',
                'Contrat' => 'CTR20240601',
                'NbrJours' => '10',
                'Montant' => '1200',
                'status' => 'terminee',
                'DateRetourPrevue' => '2024-06-10',
                'DateRetourVoiture' => '2024-06-10',
                'KilometrageApres' => '13000',
                'KilometrageAvant' => '12500',
                'ImageAvant' => 'path/to/imageAvant1.jpg',
                'ImageApres' => 'path/to/imageApres1.jpg',
                'id_vehicule' => 2, 
                'id_agent' => 2, 
                'id_clientParticulier' => 2, 
                'id_societe' => 2,
                'id_contrat' =>2,
                'MontantParJour' => 90
            ],
           
        ];
        foreach ($Location as $Location) {
            Location::create($Location);
        }
        
    }
}
