<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
 
    public function up()
    {
        Schema::table('epargnes', function (Blueprint $table) {
            $table->decimal('objectif_annuel', 8, 2)->default(0); 
            $table->decimal('montant_epargne', 8, 2)->default(0); 
        });
    }

    public function down()
    {
        Schema::table('epargnes', function (Blueprint $table) {
            $table->dropColumn('objectif_annuel');
            $table->dropColumn('montant_epargne');
        });
    }
};
