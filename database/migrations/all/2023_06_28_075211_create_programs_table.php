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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('user_id');
            $table->integer('age');
            $table->string('gender');
            $table->string('goal');
            $table->integer('number_of_workouts_per_week');
            $table->json('day')->nullable();
            $table->string('train_type');
            $table->json('apparatus')->nullable();
            $table->text('apparatus_comment');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
