<?php

namespace Database\Seeders;

use App\Models\Parking;
use Illuminate\Database\Seeder;

class ParkingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parkings = [
            [
                'Capacite' => 100,
                'pannes' => 'Quelques places sont en panne',
                'PlaceRestantes' => 50,
                'Lieu'=>'Casablanca'
            ],
            [
                'Capacite' => 150,
                'pannes' => 'Problème de signalisation',
                'PlaceRestantes' => 100,
                'Lieu'=>'Tanger'
            ],
            [
                'Capacite' => 200,
                'pannes' => 'Problème de signalisation',
                'PlaceRestantes' => 120,
                'Lieu'=>'Agadir'
            ],
            [
                'Capacite' => 80,
                'pannes' => 'tous les places sont en pannes',
                'PlaceRestantes' => 20,
                'Lieu'=>'Settat'
            ],
            [
                'Capacite' => 120,
                'pannes' => 'Ascenseur en panne',
                'PlaceRestantes' => 80,
                'Lieu'=>'Casablanca'
            ],
        ];
        foreach ($parkings as $parking) {
            Parking::create($parking);
        }
        
        
            }
        }
        