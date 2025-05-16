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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->longText('firstname')->nullable();
            $table->longText('secondname')->nullable();
            $table->longText('lastname')->nullable();
            $table->longText('phonenumber')->nullable();
            $table->longText('email')->nullable();
            $table->longText('gender')->nullable();
            $table->longText('role')->nullable();
            $table->longText('is_admin')->nullable();
            $table->longText('is_principal')->nullable();
            $table->longText('is_deputy_principal')->nullable();
            $table->longText('is_registrar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->longText('password')->nullable();
            $table->longText('status')->default('Active');
            $table->longText('profile_image')->default('profile.png');
            
            $table->longText('has_paid_reg_fee')->nullable();
            $table->longText('date_paid_reg_fee')->nullable();
            $table->longText('reg_fee_ref_no')->nullable();

            $table->unsignedBigInteger('course_id')->nullable(); // Add the course_id column
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null'); // Set foreign key constraint

            $table->unsignedBigInteger('clas_id')->nullable(); // Add the course_id column
            $table->foreign('clas_id')->references('id')->on('clas')->onDelete('set null'); // Set foreign key constraint

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        DB::table('users')->insert([
            [
                'firstname' => 'Parpus',
                'secondname' => 'Learning',
                'lastname' => 'Center',
                'phonenumber' =>'0737666770',
                'role' => 'Admin',
                'email' => 'admin@plc.ac.ke',
                'password' => Hash::make(12345678),
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
