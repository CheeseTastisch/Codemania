<?php

use App\Models\Task;
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
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->integer('level');
            $table->foreignIdFor(Task::class)->constrained()->cascadeOnDelete();
            $table->integer('points');
            $table->boolean('instantly_rated')->default(true);
            $table->foreignIdFor(UploadedFile::class, 'description_file_id')->constrained('uploaded_files')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levels');
    }
};
