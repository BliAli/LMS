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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('course_code');
            $table->string('course_name');
            $table->string('lecturer');
            $table->string('semester'); // Semester 1, Semester 2, etc
            $table->enum('status', ['in_progress', 'completed'])->default('in_progress');
            $table->string('grade')->nullable(); // A, A-, B+, B, etc
            $table->decimal('grade_point', 3, 2)->nullable(); // 4.00, 3.67, etc
            $table->integer('credits')->default(3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
