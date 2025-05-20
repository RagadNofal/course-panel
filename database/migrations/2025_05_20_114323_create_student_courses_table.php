<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('student_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->timestamp('enrolled_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('progress')->default(0);
            $table->timestamps();

            $table->unique(['student_id', 'course_id']); // Prevent duplicate enrollments
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_courses');
    }
};
