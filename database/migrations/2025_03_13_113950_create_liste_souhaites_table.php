<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up(): void
     {
         Schema::create('liste_souhaites', function (Blueprint $table) {
           $table->id();
           $table->string('description');
           $table->decimal('montant_necessaire', 10, 2); 
           $table->decimal('montant_epargne', 10, 2); 
           $table->foreignId('user_id')->constrained()->onDelete('cascade');
           $table->timestamps();
         });
     }

     public function down(): void
     {
         Schema::dropIfExists('liste_souhaites');
     }
};
