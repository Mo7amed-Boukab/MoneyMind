<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
          $table->string('phone')->nullable();
          $table->decimal('salaire', 10, 2);
          $table->integer('date_salaire');
          $table->decimal('balance', 10, 2)->nullable();
          $table->enum('role', ['user', 'admin'])->default('user');
          $table->enum('status', ['active', 'inactive'])->default('active');
          $table->timestamp('logged_at')->nullable();
        });
    }


    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn(['phone', 'salaire', 'date_salaire', 'balance', 'role', 'status', 'logged_at']);
        });
    }
};
