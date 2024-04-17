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
        Schema::create('utilisation_vehicules', function (Blueprint $table) {
            $table->id();
            $table->date('date_utilisation');
            $table->string('motif_utilisation');
            $table->integer('kilometrage_depart');
            $table->integer('kilometrage_arrivee');
            $table->foreignId('id_vehicule')->constrained('vehicules')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisation_vehicules');
    }
};
