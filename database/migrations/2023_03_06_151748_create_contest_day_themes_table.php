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
        Schema::create('contest_day_themes', function (Blueprint $table) {
            $table->id();
            $table->string('fifty');
            $table->string('hundred');
            $table->string('two_hundred');
            $table->string('three_hundred');
            $table->string('four_hundred');
            $table->string('five_hundred');
            $table->string('six_hundred');
            $table->string('seven_hundred');
            $table->string('eight_hundred');
            $table->string('nine_hundred');
            $table->string('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contest_day_themes');
    }
};
