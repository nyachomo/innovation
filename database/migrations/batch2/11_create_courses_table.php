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
            $table->text('course_name')->nullable();
            $table->text('course_level')->nullable();
            $table->text('course_duration')->nullable();
            $table->text('course_price')->nullable();
            $table->text('course_status')->default('Active');
            $table->text('course_intoduction_text')->nullable();
            $table->text('course_description')->nullable();
            $table->text('course_two_like')->nullable();
            $table->text('course_one_like')->nullable();
            $table->text('course_not_interested')->nullable();
            $table->text('course_leaners_already_enrolled')->nullable();
            $table->text('course_inclusion')->nullable();
            $table->text('what_to_learn')->nullable();
            $table->text('course_image')->nullable();
            $table->text('course_publisher_name')->nullable();
            $table->text('course_publisher_description')->nullable();
            $table->text('course_publisher_image')->nullable();
            $table->text('course_outline')->nullable();


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
