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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->longText('exam_type')->nullable();
            $table->longText('is_assignment')->nullable();
            $table->longText('is_cat')->nullable();
            $table->longText('is_final_exam')->nullable();
            $table->longText('exam_name')->nullable();
            $table->longText('exam_start_date')->nullable();
            $table->longText('exam_end_date')->nullable();
            $table->longText('exam_duration')->nullable();
            $table->longText('exam_instruction')->nullable();
            $table->longText('exam_status')->default('Active');
            $table->longText('is_published')->default('No');
            $table->longText('course_id')->nullable();
            $table->unsignedBigInteger('clas_id')->nullable();
            $table->foreign('clas_id')->references('id')->on('clas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
