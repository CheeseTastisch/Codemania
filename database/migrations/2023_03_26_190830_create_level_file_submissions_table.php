<?php

use App\Models\LevelFile;
use App\Models\LevelSubmission;
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
        Schema::create('level_file_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(LevelSubmission::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(LevelFile::class)->constrained()->cascadeOnDelete();
            $table->enum('status', ['checking', 'accepted', 'rejected'])->default('checking');
            $table->foreignIdFor(UploadedFile::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_file_submissions');
    }
};
