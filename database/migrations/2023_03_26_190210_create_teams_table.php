<?php

use App\Models\Contest;
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
            $table->foreignIdFor(Contest::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(UploadedFile::class, 'logo_file_id')->nullable()->constrained('uploaded_files')->nullOnDelete();
            $table->boolean('is_blocked')->default(false);
            $table->string('block_reason')->nullable();
            $table->foreignIdFor(User::class, 'blocked_by')->nullable()->constrained('users')->nullOnDelete();
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
