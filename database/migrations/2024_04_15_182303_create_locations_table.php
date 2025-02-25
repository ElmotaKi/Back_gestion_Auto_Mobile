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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->date('dateDebutLocation');
            $table->date('dateFinLocation');
            $table->string('Contrat');
            $table->integer('NbrJours');
            $table->decimal('Montant', 8, 2);
            $table->decimal('MontantParJour', 8, 2);
            $table->enum('status',['terminee','encours']);
            $table->date('DateRetourPrevue');
            $table->date('DateRetourVoiture')->nullable();
            $table->decimal('KilometrageApres', 8, 2)->nullable();
            $table->decimal('KilometrageAvant', 8, 2);
            $table->text('ImageAvant');
            $table->text('ImageApres')->nullable();
            $table->foreignId('id_vehicule')->constrained('vehicules')->onDelete('cascade');
            $table->foreignId('id_contrat')->constrained('contrats')->onDelete('cascade');
            $table->foreignId('id_agent')->constrained('agents')->onDelete('cascade');
            $table->foreignId('id_clientParticulier')->constrained('client_particuliers')->onDelete('cascade');
            $table->foreignId('id_societe')->constrained('societes')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
