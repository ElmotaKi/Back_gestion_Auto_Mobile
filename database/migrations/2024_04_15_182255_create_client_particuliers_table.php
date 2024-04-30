<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_particuliers', function (Blueprint $table) {
            $table->id();
            $table->string('Nom',50);
            $table->string('Prenom',50);
            $table->unique(['Nom', 'Prenom']);
            $table->enum('Sexe', ['Masculin', 'Feminin']);            
            $table->string('Email',100)->unique();
            $table->date('DateNaissance');
            $table->string('Tel');
            $table->string('Adresse');
            $table->string('Ville');
            $table->string('CodePostal');
            $table->string('CIN');
            $table->date('DateValidCIN');
            $table->string('NumeroPermis');
            $table->string('TypePermis');
            $table->string('NumeroPasseport');
            $table->string('TypePassport');
            $table->date('DateFinPassport');
            $table->string('AdresseEtrangere');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_particuliers');
    }
};
