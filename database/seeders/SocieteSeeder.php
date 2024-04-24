<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Societe;

class SocieteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $societeData = [
            [
                'RaisonSocial' => 'ABC Company Ltd',
                'ICE' => '123456789',
                'NumeroCNSS' => '987654321',
                'NumeroFiscale' => 'F123456789',
                'RegistreCommercial' => 'RC12345',
                'AdresseSociete' => '123 Rue de la Société, Ville, Pays',
            ],
            [
                'RaisonSocial' => 'Société XYZ SARL',
                'ICE' => '987654321',
                'NumeroCNSS' => '654321987',
                'NumeroFiscale' => 'F987654321',
                'RegistreCommercial' => 'RC98765',
                'AdresseSociete' => '456 Boulevard de lEntreprise, Ville, Pays',
            ],
            [
                'RaisonSocial' => 'Entreprise ABC SA',
                'ICE' => '135792468',
                'NumeroCNSS' => '246813579',
                'NumeroFiscale' => 'F246813579',
                'RegistreCommercial' => 'RC24680',
                'AdresseSociete' => '789 Avenue de la Société, Ville, Pays',
            ],
            [
                'RaisonSocial' => 'Entreprise XYZ SARL',
                'ICE' => '246813579',
                'NumeroCNSS' => '135792468',
                'NumeroFiscale' => 'F135792468',
                'RegistreCommercial' => 'RC13579',
                'AdresseSociete' => '789 Rue de lEntreprise, Ville, Pays',
            ],
            [
                'RaisonSocial' => 'Société ABC Inc',
                'ICE' => '987654321',
                'NumeroCNSS' => '456123789',
                'NumeroFiscale' => 'F456123789',
                'RegistreCommercial' => 'RC45612',
                'AdresseSociete' => '456 Avenue de lEntreprise, Ville, Pays',
            ],
            [
                'RaisonSocial' => 'Entreprise XYZ SA',
                'ICE' => '852963741',
                'NumeroCNSS' => '369258147',
                'NumeroFiscale' => 'F369258147',
                'RegistreCommercial' => 'RC36925',
                'AdresseSociete' => '369 Rue de lEntreprise, Ville, Pays',
            ],
        ];

        // Vérifier si la classe Societe existe avant de créer les instances
        if (class_exists(Societe::class)) {
            foreach ($societeData as $societesData) {
                Societe::create($societesData);
            }
        } else {
            // Gérer l'absence de la classe Societe
            echo "La classe Societe n'existe pas.";
        }
    }
}
