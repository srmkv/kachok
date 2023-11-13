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
        Schema::table('dishes', function (Blueprint $table) {
            $table->dropForeign('dishes_period_day_id_foreign');
            $table->dropIndex('dishes_period_day_id_foreign');
            $table->dropColumn(['gram', 'protein', 'fat', 'period_day_id']);
            $table->text('description');
            $table->string('cooking_time');
            $table->text('method_preparation')->nullable();
            $table->text('steps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dishes', function (Blueprint $table) {
            //
        });
    }
};
