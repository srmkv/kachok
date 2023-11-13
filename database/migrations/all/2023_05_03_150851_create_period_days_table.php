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
        Schema::create('period_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('day_id');
            $table->string('name')->nullable();
            $table->timestamps();

            $table->foreign('day_id')
                ->references('id')->on('day_for_food')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('period_days');
    }
};
