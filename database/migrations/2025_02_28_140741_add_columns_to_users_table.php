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
        Schema::table('users', function (Blueprint $table) {
          $table->string('phone')->nullable();
          $table->decimal('salaire', 10, 2);
          $table->date('date_salaire');
          $table->decimal('balance', 10, 2)->nullable();
          $table->enum('role', ['user', 'admin'])->default('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn(['phone', 'salaire', 'date_salaire', 'balance', 'role']);
        });
    }
};
