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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string("orderStatus",100)->nullable(true)->default("Order is Placed");
            $table->string("paymentMode",15)->nullable(true)->default("COD");
            $table->string("paymentStatus",10)->nullable(true)->default("Pending");

            $table->integer("subtotal")->require(true);
            $table->integer("shipping")->require(true);
            $table->integer("total")->require(true);

            
            $table->bigInteger("user_id")->unsigned()->index();
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');

              
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
