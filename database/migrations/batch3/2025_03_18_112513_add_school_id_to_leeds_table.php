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
        Schema::table('leeds', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('school_id')->nullable()->after('id'); // Add school_id column
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('set null'); // Foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leeds', function (Blueprint $table) {
            //
            $table->dropForeign(['school_id']);
            $table->dropColumn('school_id');
        });
    }
};
