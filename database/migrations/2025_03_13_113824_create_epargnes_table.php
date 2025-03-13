
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('epargnes', function (Blueprint $table) {
            $table->id();
            $table->decimal('objectif_mensuel', 10, 2)->nullable(); 
            $table->decimal('epargne_mensuel', 10, 2)->nullable(); 
            $table->decimal('epargne_total', 10, 2)->nullable();
            $table->decimal('objectif_annuel', 8, 2)->nullable();
            $table->decimal('epargne_objectif_annuel', 10, 2)->nullable(); 
            $table->decimal('epargne_annuel', 10, 2)->nullable(); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('epargnes');
    }
};
