<?php

use App\Models\ContestDay;
use App\Models\UploadedFile;
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
        Schema::create('contest_day_sponsors', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ContestDay::class);
            $table->string('name');
            $table->string('url');
            $table->foreignIdFor(UploadedFile::class, 'logo_id');
            $table->enum('background', ['light', 'dark'])->default('light');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contest_day_sponsors');
    }
};
