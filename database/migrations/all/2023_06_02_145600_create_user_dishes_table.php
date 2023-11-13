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
        Schema::create('user_dishes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('period_day_id');
            $table->string('name');
            $table->integer('gram');
            $table->integer('protein');
            $table->integer('fat');
            $table->integer('energy');
            $table->string('photo')->nullable();
            $table->timestamps();

            $table->foreign('period_day_id')
                ->references('id')->on('period_days')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_dishes');
    }
};
