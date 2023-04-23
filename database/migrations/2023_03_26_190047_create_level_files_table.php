<?php

use App\Models\Level;
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
        Schema::create('level_files', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Level::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(UploadedFile::class, 'input_file_id')->constrained('uploaded_files')->cascadeOnDelete();
            $table->foreignIdFor(UploadedFile::class, 'solution_file_id')->constrained('uploaded_files')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_files');
    }
};
