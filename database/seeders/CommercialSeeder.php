<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Commercial;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommercialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $commercialData=[
           ['CIN'=>'BA23434',
           'Nom'=>'aya',
           'Prenom'=>'hamid',
           'Sexe'=>'Feminin',
           'DateNaissance'=>Carbon::createFromFormat('d-m-Y', '23-04-2002')->toDateString(),
           'Tel'=>'0634930203',
           'Adresse'=>'firdaous',
           'ville'=>'casa',
           'id_societe'=>'1',
            
    ],
        [
            'CIN' =>'AB12345',
            'Nom' =>'Smith',
            'Prenom' =>'Emma',
            'Sexe' => 'Féminin',
            'DateNaissance' =>Carbon::createFromFormat('d-m-Y', '23-04-2002')->toDateString(),
            'Tel' =>'0612345678',
            'Adresse' =>'123 Rue des Lilas',
            'Ville' =>'Paris',
            'id_societe'=>'2',
        ],
        ['CIN' => 'CD67890',
        'Nom' =>'Johnson',
        'Prenom' => 'John',
        'Sexe' =>'Masculin',
        'DateNaissance' =>Carbon::createFromFormat('d-m-Y', '23-04-2002')->toDateString(),
        'Tel' =>'0654321098',
        'Adresse' =>'456 Avenue des Roses',
        'Ville' => 'Lyon',
        'id_societe'=>'3',

    ],

        ['CIN' =>'EF54321',
        'Nom' => 'Garcia',
        'Prenom' => 'Maria',
        'Sexe' => 'Féminin',
        'DateNaissance' => Carbon::createFromFormat('d-m-Y', '23-04-2002')->toDateString(),
        'Tel' => '0678901234',
        'Adresse' => '789 Boulevard des Tulipes',
        'Ville' => 'Marseille',
        'id_societe'=>'4',
        
    ],

        ['CIN' => 'GH98765',
        'Nom' => 'Choi',
        'Prenom' => 'Minho',
        'Sexe' => 'Masculin',
        'DateNaissance' => Carbon::createFromFormat('d-m-Y', '23-04-2002')->toDateString(),
        'Tel' => '0601234567',
        'Adresse' => '1010 Rue des Champs',
        'Ville' => 'Seoul',
        'id_societe'=>'5',
        
    ],

        ['CIN' => 'IJ34567',
        'Nom' => 'Ahmed',
        'Prenom' => 'Fatima',
        'Sexe' => 'Féminin',
       'DateNaissance' => Carbon::createFromFormat('d-m-Y', '23-04-2002')->toDateString(),
       'Tel' => '0678901234',
       'Adresse' => '321 Avenue du Soleil',
       'Ville' => 'Rabat',
       'id_societe'=>'6',
    ],

     
    ];
    // $count = 0;

    // foreach ($commercialData as $commercialsData) {
    //     $count++;
    
    //     // Vérifie si le nombre d'enregistrements insérés est égal à 5
    //     if ($count == 7) {
    //         break; // Sort de la boucle
    //     }
    if (class_exists(Commercial::class)) {
        foreach ($commercialData as $commercialsData) {
            Commercial::create($commercialsData);
        }
        
    }
    }}
