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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('Marque');
            $table->string('Model');
            $table->string('Categorie');
            $table->decimal('Kilometrage',10,3);
            $table->string('Pneumatique');
            $table->string('NumeroDechassis');
            $table->string('Immatriculation')->unique();
            $table->date('DateD_achat');
            $table->integer('numeroDePlace');
            $table->boolean('Disponibilité');
            $table->date('jourTitulaire');
            $table->decimal('Montant', 8, 2);
            $table->decimal('MontantRestantApayer', 8, 2);
            $table->text('ImageVoiture');
            $table->enum('typeBoiteVitesse',['manuelle','automatique']);
            $table->year('annee');
            $table->integer('placeAssure');
            $table->string('typeCarburant');
            $table->foreignId('id_agence')->constrained('agence_locations')->onDelete('cascade');
            $table->foreignId('id_parking')->constrained('parkings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
