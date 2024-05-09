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
        Schema::create('agence_locations', function (Blueprint $table) {
            $table->id();
            $table->string('NomAgence');
            $table->string('AdresseAgence');
            $table->string('VilleAgence');
            $table->string('CodePostalAgence');
            $table->string('TelAgence');
            $table->string('EmailAgence',100)->unique();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agence_locations');
    }
};
