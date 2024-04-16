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
        Schema::create('visite_techniques', function (Blueprint $table) {
            $table->id();
            $table->date('DateVisite');
            $table->string('TypeVisite');
            $table->enum('resultat', ['Conforme', 'Non_conforme','Echec']);
            $table->date('DateExpirationVisiteTechnique');
            $table->foreignId('vehicule_id')->constrained('vehicules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visite_techniques');
    }
};
