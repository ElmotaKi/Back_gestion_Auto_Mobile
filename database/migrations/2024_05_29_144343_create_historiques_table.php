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
        Schema::create('historiques', function (Blueprint $table) {
            $table->id();
            $table->date('Date_reparation');
            $table->string('Type_reparation');
            $table->string('cout');
            $table->string('kilometrage');
            $table->string('Etat_Pneu_Avant');
            $table->string('Etat_Pneu_Apres');
            $table->foreignId('id_vehicule')->constrained('vehicules')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historiques');
    }
};
