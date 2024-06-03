<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     */
    public function up(): void
    {
        Schema::create('accidents', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->date('date_accident');
            $table->time('temps_accident');
            $table->string('lieu');
            $table->decimal('cout_dommage');
            $table->string('rapport_police');
            $table->enum('statut_resolution',['En_cours','Résolu','En_attente']);
            $table->foreignId('id_vehicule')->constrained('vehicules')->onDelete('cascade');
            $table->foreignId('id_location')->constrained('locations')->onDelete('cascade');
            $table->foreignId('id_assurance')->constrained('assurances')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Annule les migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accidents');
    }
};
