<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();

            $table->string('first_name');
            $table->string('last_name');

            $table->string('nickname')->nullable();
            $table->enum('display_name_type', ['first_name', 'last_name', 'full_name', 'nickname'])->default('full_name');
            $table->date('birthday')->nullable();
            $table->enum('gender', ['m', 'f', 'o'])->nullable();
            $table->string('class')->nullable();
            $table->string('school')->nullable();
            $table->longText('about')->nullable();
            $table->foreignIdFor(UploadedFile::class, 'profile_picture_id')->nullable()->constrained('uploaded_files')->nullOnDelete();

            $table->string('theme')->default('light');
            $table->boolean('is_admin')->default(false);
            $table->string('two_factor_secret')->nullable();
            $table->longText('two_factor_recovery_codes')->nullable();
            $table->timestamp('confirmed_two_factor_at')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
