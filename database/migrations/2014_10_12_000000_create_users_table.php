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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->require();
            $table->string('email')->unique()->require();
            $table->string('phone', 10)->nullable();
            $table->string('role', 10)->nullable(true)->default("Buyer");
            $table->string('address', 100)->nullable(true)->default("");
            $table->string('pin', 10)->nullable(true)->default("");
            $table->string('city', 50)->nullable(true)->default("");
            $table->string('state', 50)->nullable(true)->default("");
            $table->string('pic', 100)->nullable(true)->default("");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
