<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->longText('company_name')->nullable();
            $table->longText('company_logo')->nullable();
            $table->longText('company_motto')->nullable();
            $table->longText('company_mission')->nullable();
            $table->longText('company_vission')->nullable();
            $table->longText('company_kra_pin')->nullable();
            $table->longText('company_website')->nullable();
            $table->longText('company_address')->nullable();
            $table->longText('company_facebook')->nullable();
            $table->longText('company_twitter')->nullable();
            $table->longText('company_instagram')->nullable();
            $table->longText('company_linkedin')->nullable();
            $table->longText('company_skype')->nullable();
            $table->longText('company_github')->nullable();
            $table->longText('company_details_status')->default();
            $table->longText('company_logo_status')->default();
            $table->timestamps();
        });

        DB::table('settings')->insert([
            [
                'company_name' => 'Parpus Academy',
                'company_logo' => 'logo.jpg',
                'company_motto' => 'Empowering Mind, Securing Future',
                'company_mission' => 'To provide accessible, innovative, and high-quality training in technology and programming, empowering individuals with the skills and knowledge to thrive in the digital age.',
                'company_vission' => 'To be a leading institution in technological education, fostering innovation, creativity, and excellence to build a skilled and future-ready workforce.',
                'company_kra_pin' => '',
                'company_website' => 'https://plc.co.ke/',
                'company_address' => 'Po Box 7854329 Nairobi',
                'company_facebook' =>'https://www.parpusfacebook.com',
                'company_twitter' => 'https://www.parpustwitter.com',
                'company_instagram' => 'https://www.parpusinstagram.com',
                'company_linkedin' => 'https://www.parpuslinkdn.com',
                'company_skype' => 'https://www.parpusskype.com',
                'company_github' => 'https://www.parpusgithub.com',
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
