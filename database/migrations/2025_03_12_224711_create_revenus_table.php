<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up(): void
     {
         Schema::create('revenus', function (Blueprint $table) {
             $table->id();
             $table->date('date');
             $table->string('description'); 
             $table->decimal('montant_salaire', 10, 2); 
             $table->foreignId('user_id')->constrained()->onDelete('cascade');
             $table->timestamps();
         });

     }


     public function down(): void
     {
         Schema::dropIfExists('revenu');
     }
};
