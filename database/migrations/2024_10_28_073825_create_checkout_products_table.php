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
        Schema::create('checkout_products', function (Blueprint $table) {
            $table->id();
            $table->integer('qty')->nullable();
            $table->integer('total'); 
              
            $table->bigInteger("checkout_id")->unsigned()->index();
            $table->foreign("checkout_id")->references("id")->on("checkouts")->onDelete('cascade');


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
        Schema::dropIfExists('checkout_products');
    }
};
