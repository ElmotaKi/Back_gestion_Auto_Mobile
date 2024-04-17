<?php

namespace Database\Seeders;

use App\Models\AgenceLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgenceLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'NomAgence' => 'Location Voiture Casablanca',
                'AdresseAgence' => '123 Avenue Hassan II',
                'VilleAgence' => 'Casablanca',
                'CodePostalAgence' => '20000',
                'TelAgence' => '+212 5 22 45 67 89',
                'EmailAgence' => 'location.casablanca@example.com',
            ],
            [
                'NomAgence' => 'Agence de Location Marrakech',
                'AdresseAgence' => '456 Rue Mohamed V',
                'VilleAgence' => 'Marrakech',
                'CodePostalAgence' => '40000',
                'TelAgence' => '+212 5 24 56 78 90',
                'EmailAgence' => 'location.marrakech@example.com',
            ],
            [
                'NomAgence' => 'Agence de Location Rabat',
                'AdresseAgence' => '789 Avenue Mohammed VI',
                'VilleAgence' => 'Rabat',
                'CodePostalAgence' => '10000',
                'TelAgence' => '+212 5 37 89 01 23',
                'EmailAgence' => 'location.rabat@example.com',
            ],
            [
                'NomAgence' => 'Location Auto Tanger',
                'AdresseAgence' => '12 Rue Ibn Battouta',
                'VilleAgence' => 'Tanger',
                'CodePostalAgence' => '90000',
                'TelAgence' => '+212 5 39 12 34 56',
                'EmailAgence' => 'location.tanger@example.com',
            ],
            [
                'NomAgence' => 'Agence de Voiture Agadir',
                'AdresseAgence' => '78 Boulevard Hassan II',
                'VilleAgence' => 'Agadir',
                'CodePostalAgence' => '80000',
                'TelAgence' => '+212 5 28 56 78 90',
                'EmailAgence' => 'location.agadir@example.com',
            ],
        ];
        foreach ($data as $agence) {
            AgenceLocation::create($agence);
        }
        
    }
}
