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
        Schema::create('bju_parametres', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('user_id');
            $table->float('goal');
            $table->float('weight_now');
            $table->float('height');
            $table->integer('age');
            $table->string('gender');
            $table->float('activity');
            $table->float('desired_weight');


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
        Schema::dropIfExists('bju_parametres');
    }
};
