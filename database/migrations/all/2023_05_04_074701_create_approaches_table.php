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
        Schema::create('approaches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('period_training_id');
            $table->integer('kg');
            $table->integer('repeat');
            $table->timestamps();

            $table->foreign('period_training_id')
                ->references('id')->on('period_trainings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approaches');
    }
};
