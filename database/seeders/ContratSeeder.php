<?php

namespace Database\Seeders;

use App\Models\Contrat;
use App\Controllers\ContratController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Contrats = [
            [
               
                'nomContrat' => 'Contrat de location de voiture',
                'typeContrat' => 'Location',
                'descriptionContrat' => 'Contrat pour la location d une voiture pour une durée déterminée.',           
                
            ],
            [
                'nomContrat' => 'Contrat de vente de services',
                'typeContrat' => 'Vente',
                'descriptionContrat' => 'Contrat pour la prestation de services informatiques pour une entreprise cliente.',
            
            ],
            [
                'nomContrat' => 'Contrat de maintenance informatique',
                'typeContrat' => 'Service',
                'descriptionContrat' => 'Contrat pour la maintenance et le support informatique pour une période d un an.',
             
            ],
            
            [
                'nomContrat' => 'Contrat de vente de matériel électronique',
                'typeContrat' => 'Vente',
                'descriptionContrat' => 'Contrat pour la vente de matériel électronique incluant des téléphones et des ordinateurs portables.',

            ],
        ];
        foreach ($Contrats as $Contrat) {
            Contrat::create($Contrat);
        }
        
    }
}
