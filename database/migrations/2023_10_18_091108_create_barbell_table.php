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
        Schema::create('barbell', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('kg');
            $table->boolean('active')->nullable();
            $table->integer('type')->default(1);
            $table->integer('sort')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barbell');
    }
};
