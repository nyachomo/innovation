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
        Schema::create('leeds', function (Blueprint $table) {
            $table->id();
            $table->longText('student_firstname')->nullable();
            $table->longText('student_lastname')->nullable();
            $table->longText('student_email')->nullable();
            $table->longText('student_phone')->nullable();
            $table->longText('student_gender')->nullable();
            $table->longText('student_school')->nullable();
            $table->longText('student_form')->nullable();
            $table->longText('comment')->nullable();
            $table->longText('year_data_captured')->nullable();
            $table->longText('parent_name')->nullable();
            $table->longText('parent_phone')->nullable();
            $table->longText('parent_email')->nullable();
            $table->longText('student_location')->nullable();
            $table->longText('is_form_four')->nullable();
            $table->longText('course_id')->nullable();
            $table->longText('serial_number')->nullable();
            $table->longText('course_register_for')->nullable();
            $table->longText('scholarship_letter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leeds');
    }
};
