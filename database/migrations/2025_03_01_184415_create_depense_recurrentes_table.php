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
        Schema::create('depenses_recurrentes', function (Blueprint $table) {
          $table->id();
          $table->string('description');
          $table->decimal('montant', 10, 2);  
          $table->date('date_paiement'); 
          $table->foreignId('categorie_id')->constrained()->onDelete('cascade');
          $table->foreignId('user_id')->constrained()->onDelete('cascade');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depense_recurrentes');
    }
};
