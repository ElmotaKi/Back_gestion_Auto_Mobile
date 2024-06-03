<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AgenceLocationSeeder::class,
            ParkingSeeder::class,
            VehiculeSeeder::class,
            AgentSeeder::class,
            SocieteSeeder::class,
            CommercialSeeder::class,
            ClientParticulierSeeder::class,
            ContratSeeder::class,
            AssuranceSeeder::class,
            VidangeSeeder::class,
            VignetteSeeder::class,
            VisiteTechniqueSeeder::class,
            LocationSeeder::class,
            PneumatiqueSeeder::class,
            HistoriqueSeeder::class,
            AccidentSeeder::class
        ]);
    }
}
