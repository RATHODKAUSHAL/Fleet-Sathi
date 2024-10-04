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
        Schema::create('company_master', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 100);
            $table->string('slug')->unique();
            $table->string('contact_number')->nullable();
            $table->text('company_address')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('gst_number')->nullable();
            $table->string('co_pan_number')->nullable();
            $table->foreignId('admin_id')->unique();
            $table->foreignId('city_id')->unique();
            $table->foreignId('state_id')->unique();
            $table->string('website')->nullable();
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('users');
            $table->foreign('city_id')->references('id')->on('city_master');
            $table->foreign('state_id')->references('id')->on('state_master');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_master');
    }
};
