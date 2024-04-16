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
        Schema::create('commercials', function (Blueprint $table) {
            $table->id();
            $table->string('CIN');
            $table->string('Nom');
            $table->string('Prenom');
            $table->enum('Sexe', ['Masculin', 'Feminin']);            
            $table->date('DateNaissance');
            $table->string('Tel');
            $table->string('Adresse');
            $table->string('Ville');
            $table->foreignId('id_societe')->constrained('societes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commercials');
    }
};
