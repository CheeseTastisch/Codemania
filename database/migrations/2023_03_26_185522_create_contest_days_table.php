<?php

use App\Models\ContestDayTheme;
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
        Schema::create('contest_days', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();
            $table->date('registration_deadline')->nullable();
            $table->string('name');
            $table->timestamp('allow_training_from')->nullable();
            $table->boolean('training_only')->default(false);
            $table->boolean('current')->default(false);
            $table->foreignIdFor(ContestDayTheme::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contest_days');
    }
};
