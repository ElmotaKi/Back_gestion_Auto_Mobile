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
        Schema::create('vidanges', function (Blueprint $table) {
            $table->id();
            $table->date('DateVidange');
            $table->string('TypeVidange');
            $table->integer('DureeDeVidange');
            $table->string('Cout');
            $table->decimal('KilometrageDerniereVidange',10,2);
            $table->foreignId('id_vehicule')->constrained('vehicules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vidanges');
    }
};
