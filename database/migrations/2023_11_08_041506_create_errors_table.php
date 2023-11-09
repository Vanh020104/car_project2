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
        Schema::create('errors', function (Blueprint $table) {
            $table->id(); // Cột id
            $table->string('name'); // Cột name
            $table->string('image')->nullable(); // Cột image
            $table->unsignedDecimal('level1',10,2)->default(0); // Cột level1
            $table->unsignedDecimal('level2',10,2)->default(0); // Cột level2
            $table->unsignedDecimal('level3',10,2)->default(0); // Cột level3
            $table->timestamps(); // Thêm cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('errors');
    }
};
