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
        Schema::create('class_notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clas_id')->nullable();
            $table->longText('date')->nullable();
            $table->longText('notes')->nullable();
            $table->longText('video_link')->nullable();
            $table->foreign('clas_id')->references('id')->on('clas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_notes');
    }
};
