<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug")->unique();
            $table->unsignedDecimal("price");
            $table->unsignedDecimal("hourly_price");
            $table->unsignedDecimal("deposit"); // tiên cọc
            $table->integer("seat");
            $table->integer("door");
            $table->string("fuel_style");
            $table->integer("car_year");
            $table->integer("mileage");
            $table->integer("power");
            $table->string("color");
            $table->string("thumbnail");
            $table->text("description");
            $table->unsignedSmallInteger("qty");
            $table->unsignedBigInteger("category_id");
            $table->foreign("category_id")->references("id")->on("categories");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
