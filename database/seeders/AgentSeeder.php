<?php

namespace Database\Seeders;

use App\Models\AgenceLocation;
use App\Models\Agent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agentsData = [
            [
                'NomAgent' => 'El Amrani',
                'PrenomAgent' => 'Youssef',
                'SexeAgent' => 'Masculin',
                'EmailAgent' => 'youssef.elamrani@example.com',
                'TelAgent' => '+212 6 87 65 43 21',
                'AdresseAgent' => '789 Boulevard Mohammed VI',
                'VilleAgent' => 'Marrakech',
                'CodePostalAgent' => '40000',
                'id_agence' => '1',
            ],
            [
                'NomAgent' => 'Saidi',
                'PrenomAgent' => 'Amina',
                'SexeAgent' => 'Feminin',
                'EmailAgent' => 'amina.saidi@example.com',
                'TelAgent' => '+212 6 54 32 10 98',
                'AdresseAgent' => '101 Rue Omar Ibn Khattab',
                'VilleAgent' => 'Marrakech',
                'CodePostalAgent' => '30000',
                'id_agence' => '2',
            ],
            [
                'NomAgent' => 'Benchekroun',
                'PrenomAgent' => 'Karim',
                'SexeAgent' => 'Masculin',
                'EmailAgent' => 'karim.benchekroun@example.com',
                'TelAgent' => '+212 6 78 90 12 34',
                'AdresseAgent' => '555 Avenue Abdelkrim El Khattabi',
                'VilleAgent' => 'Rabat',
                'CodePostalAgent' => '90000',
                'id_agence' => '3',
            ],
            [
                'NomAgent' => 'Hamdi',
                'PrenomAgent' => 'Samira',
                'SexeAgent' => 'Feminin',
                'EmailAgent' => 'samira.hamdi@example.com',
                'TelAgent' => '+212 6 43 21 09 87',
                'AdresseAgent' => '202 Route Hassan II',
                'VilleAgent' => 'Tanger',
                'CodePostalAgent' => '50000',
                'id_agence' => '4',
            ],
            [
                'NomAgent' => 'Bouslama',
                'PrenomAgent' => 'Mehdi',
                'SexeAgent' => 'Masculin',
                'EmailAgent' => 'mehdi.bouslama@example.com',
                'TelAgent' => '+212 6 32 10 98 76',
                'AdresseAgent' => '404 Boulevard Allal El Fassi',
                'VilleAgent' => 'Agadir',
                'CodePostalAgent' => '80000',
                'id_agence' => '5',
            ]
        ];
        $count = 0;

foreach ($agentsData as $agentData) {
    $count++;

    // Vérifie si le nombre d'enregistrements insérés est égal à 5
    if ($count == 6) {
        break; // Sort de la boucle
    }

    Agent::create($agentData);
}



    }
}
