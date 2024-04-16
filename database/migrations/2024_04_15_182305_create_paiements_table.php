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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->date('DatePaiement');
            $table->decimal('Montant', 8, 2);
            $table->enum('typePaiement', ['carte', 'cheque', 'espece']);
            $table->enum('MethodePaiement', ['partielle', 'complete']);
            $table->enum('status',['complete','encours']);
            $table->foreignId('id_client_particulier')->constrained('client_particuliers')->onDelete('cascade');
            $table->foreignId('id_societe')->constrained('societes')->onDelete('cascade');
            $table->foreignId('id_location')->constrained('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
