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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('title'); // e.g., Week 1 - Introduction
            $table->text('description')->nullable();
            $table->string('file_path')->nullable(); // Path to uploaded file
            $table->string('file_type')->nullable(); // PDF, PPT, etc.
            $table->integer('week')->default(1); // Week number
            $table->date('uploaded_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
