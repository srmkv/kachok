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
        Schema::create('food_dishes', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('day_food_id');
            $table->unsignedSmallInteger('dish_id');
            $table->timestamps();

            $table->foreign('day_food_id')
                ->references('id')->on('day_food')->onDelete('cascade');
            $table->foreign('dish_id')
                ->references('id')->on('dish')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_dishes');
    }
};
