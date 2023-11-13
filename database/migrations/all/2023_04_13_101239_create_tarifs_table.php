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
        Schema::create('tarifs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->float('price')->nullable();
            $table->string('status_1')->nullable();
            $table->string('status_2')->nullable();
            $table->string('status_3')->nullable();
            $table->string('status_4')->nullable();
            $table->string('status_5')->nullable();
            $table->string('status_6')->nullable();
            $table->string('status_7')->nullable();
            $table->string('status_8')->nullable();
            $table->string('status_9')->nullable();
            $table->string('status_10')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifs');
    }
};
