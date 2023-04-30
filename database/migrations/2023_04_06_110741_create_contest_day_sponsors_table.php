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
            $table->foreignIdFor(ContestDay::class)->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('url');
            $table->foreignIdFor(UploadedFile::class, 'logo_id')->constrained('uploaded_files')->cascadeOnDelete();
            $table->enum('background', ['light', 'dark'])->default('light');
            $table->boolean('on_canvas')->default(false);
            $table->timestamps();
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
