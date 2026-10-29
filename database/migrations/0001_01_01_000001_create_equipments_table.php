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
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('asset_code', 20);->unique();
            $table->string('name', 150);
            $table->text('spesification');
            $table->enum('condition');
            $table->enum('status');
            $table->integer('daily_rental_fee')->default(0);
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equpments');
    }
};
