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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name")->require(true);
            $table->string("color",30)->require(true);
            $table->string("size",10)->require(true);
            $table->integer("basePrice")->require(true);
            $table->integer("discount")->require(true);
            $table->integer("finalPrice")->require(true);
            $table->boolean("stock",10)->require(true)->nullable()->default(true);
            $table->integer("StockQuantity")->require(true);
            $table->text("description")->nullable(true)->default("");


            $table->bigInteger("maincategory_id")->unsigned()->index();
            $table->foreign("maincategory_id")->references("id")->on("maincategories")->onDelete('cascade');

            $table->bigInteger("subcategory_id")->unsigned()->index();
            $table->foreign("subcategory_id")->references("id")->on("subcategories")->onDelete('cascade');

            $table->bigInteger("brand_id")->unsigned()->index();
            $table->foreign("brand_id")->references("id")->on("brands")->onDelete('cascade');


            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
