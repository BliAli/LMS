<?php

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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., Data Science IF-A
            $table->string('code')->unique(); // e.g., IF-A
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
            $table->string('day'); // e.g., Monday
            $table->time('start_time'); // e.g., 02:00 PM
            $table->time('end_time'); // e.g., 03:30 PM
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
