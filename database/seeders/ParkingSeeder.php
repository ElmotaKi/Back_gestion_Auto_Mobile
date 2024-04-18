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
            ],
            [
                'Capacite' => 150,
                'pannes' => 'Problème de signalisation',
                'PlaceRestantes' => 100,
            ],
            [
                'Capacite' => 200,
                'pannes' => 'Problème de signalisation',
                'PlaceRestantes' => 120,
            ],
            [
                'Capacite' => 80,
                'pannes' => 'tous les places sont en pannes',
                'PlaceRestantes' => 20,
            ],
            [
                'Capacite' => 120,
                'pannes' => 'Ascenseur en panne',
                'PlaceRestantes' => 80,
            ],
        ];
        foreach ($parkings as $parking) {
            Parking::create($parking);
        }
        
        
            }
        }
        