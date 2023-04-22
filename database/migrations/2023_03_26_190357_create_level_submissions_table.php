<?php

use App\Models\Level;
use App\Models\Team;
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
        Schema::create('level_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Team::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Level::class)->constrained()->cascadeOnDelete();
            $table->enum('status', ['pending', 'checking', 'accepted', 'rejected'])->default('pending');
            $table->timestamp('status_changed_at')->useCurrent();
            $table->foreignIdFor(UploadedFile::class, 'source_file_id')->nullable();
            $table->foreignIdFor(UploadedFile::class, 'image_file_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_submissions');
    }
};
