<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('epargnes', function (Blueprint $table) {
           $table->decimal('epargne_objectif', 10, 2)->nullable();
         });
    }


    public function down(): void
    {
        Schema::table('epargnes', function (Blueprint $table) {
           $table->dropColumn('epargne_objectif');
        });
    }
};
