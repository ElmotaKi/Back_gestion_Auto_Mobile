<?php

namespace Database\Seeders;

use App\Models\ClientParticulier;
use App\Controllers\ClientParticulierController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientParticulierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ClientParticuliers = [
            [
                'Nom' => 'Berrada',
                'Prenom' => 'Imane',
                'Sexe' => 'Feminin',
                'Email' => 'BerradaImane@gmail.ma',
                'DateNaissance' => '1999-03-15',
                'Tel' => '0600000',
                'Adresse' => 'Rue1 App3',
                'Ville' => 'CasaBlanca',
                'CodePostal' => '20000',
                'CIN' => 'BB20000',
                'DateValidCIN' => '2024-05-20',
                'NumeroPermis' => '12',
                'typePermis' => 'A',
                'NumeroPasseport' => '24',
                'TypePassport' => 'A',
                'DateFinPassport' => '2024-06-13',
                'AdresseEtrangere' => 'App4 Rue11'
            ],
            [
                'Nom' => 'Razi',
                'Prenom' => 'Khadija',
                'Sexe' => 'Feminin',
                'Email' => 'RaziKhadija@gmail.ma',
                'DateNaissance' => '1998-03-20',
                'Tel' => '0610000',
                'Adresse' => 'Rue1 App3',
                'Ville' => 'CasaBlanca',
                'CodePostal' => '20000',
                'CIN' => 'BB20001',
                'DateValidCIN' => '2024-08-21',
                'NumeroPermis' => '32',
                'typePermis' => 'A',
                'NumeroPasseport' => '21',
                'TypePassport' => 'A',
                'DateFinPassport' => '2024-03-12',
                'AdresseEtrangere' => 'App4 Rue11'
            ],
            [
                'Nom' => 'Idrissi',
                'Prenom' => 'Mohamed',
                'Sexe' => 'Masculin',
                'Email' => 'IdrissiMohamed@gmail.ma',
                'DateNaissance' => '1992-06-27',
                'Tel' => '0615000',
                'Adresse' => 'Rue2 App11',
                'Ville' => 'CasaBlanca',
                'CodePostal' => '20000',
                'CIN' => 'BB22001',
                'DateValidCIN' => '2024-09-25',
                'NumeroPermis' => '40',
                'typePermis' => 'A',
                'NumeroPasseport' => '23',
                'TypePassport' => 'A',
                'DateFinPassport'=>'2024-09-25',
                'AdresseEtrangere' => 'App5 Rue12'
            ],
            [
                
                    'Nom' => 'Doe',
                    'Prenom' => 'John',
                    'Sexe' => 'Masculin',
                    'Email' => 'john.doe@example.com',
                    'DateNaissance' => '1995-08-20',
                    'Tel' => '0601020304',
                    'Adresse' => '123 Rue de la Liberté',
                    'Ville' => 'Paris',
                    'CodePostal' => '75001',
                    'CIN' => 'AB123456',
                    'DateValidCIN' => '2025-05-10',
                    'NumeroPermis' => '789',
                    'typePermis' => 'B',
                    'NumeroPasseport' => '456',
                    'TypePassport' => 'B',
                    'DateFinPassport' => '2025-05-10',
                    'AdresseEtrangere' => '144 Rue de la Liberté'
                
                
            ],
            [
                'Nom' => 'Dupont',
                'Prenom' => 'Marie',
                'Sexe' => 'Féminin',
                'Email' => 'marie.dupont@example.com',
                'DateNaissance' => '1990-03-15',
                'Tel' => '0601020304',
                'Adresse' => '123 Rue de la Liberté',
                'Ville' => 'Paris',
                'CodePostal' => '75001',
                'CIN' => 'AB123456',
                'DateValidCIN' => '2025-05-10',
                'NumeroPermis' => '789',
                'typePermis' => 'B',
                'NumeroPasseport' => '456',
                'TypePassport' => 'B',
                'DateFinPassport'=> '2024-09-25',
                'AdresseEtrangere' => '166 Rue de la Liberté'
            ],
        ];
        foreach ($ClientParticuliers as $ClientParticulier) {
            ClientParticulier::create($ClientParticulier);
        }
        
    }
}