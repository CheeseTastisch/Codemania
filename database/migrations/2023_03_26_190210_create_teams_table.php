<?php

use App\Models\ContestDay;
use App\Models\UploadedFile;
use App\Models\User;
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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(ContestDay::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(UploadedFile::class, 'logo_file_id')->nullable();
            $table->boolean('is_blocked')->default(false);
            $table->string('block_reason')->nullable();
            $table->foreignIdFor(User::class, 'blocked_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
