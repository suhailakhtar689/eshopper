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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('qty')->nullable();
            $table->integer('total'); 
     
              
            $table->bigInteger("user_id")->unsigned()->index();
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');

              
            $table->bigInteger("product_id")->unsigned()->index();
            $table->foreign("product_id")->references("id")->on("products")->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
