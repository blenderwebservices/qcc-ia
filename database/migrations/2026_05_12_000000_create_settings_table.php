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
        Schema::create('settings', function (Blueprint $row) {
            $row->id();
            $row->string('instagram_url')->nullable();
            $row->string('facebook_url')->nullable();
            $row->string('linkedin_url')->nullable();
            $row->string('email_1')->nullable();
            $row->string('email_2')->nullable();
            $row->string('public_admin_image')->nullable();
            $row->string('health_image')->nullable();
            $row->string('education_image')->nullable();
            $row->string('social_services_image')->nullable();
            $row->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
