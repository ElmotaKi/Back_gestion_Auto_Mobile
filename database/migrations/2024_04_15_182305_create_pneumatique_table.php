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
        Schema::create('pneumatiques', function (Blueprint $table) {
            $table->id();
            $table->string('Marque_Pneu');
            $table->string('Modele_Pneu');
            $table->string('Dimension_Pneu');
            $table->string('Type_Pneu');
            $table->string('Position_Pneu');
            $table->string('Etat_Pneu');
            $table->date('Date_Verification');
            $table->date('Date_Installation');
            $table->date('Date_Changement')->nullable();
            $table->date('Date_Fin_Pneu');
            $table->string('kilometrage_Verification');
            $table->string('kilometrage_Installation');
            $table->string('kilometrage_Final');
            $table->string('Historique_Reparations');
            $table->foreignId('id_vehicule')->constrained('vehicules')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pneumatiques');
    }
};
