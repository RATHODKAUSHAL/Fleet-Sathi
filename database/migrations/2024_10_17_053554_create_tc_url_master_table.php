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
        Schema::create('tc_url_master', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->nullable();
            $table->string('company_icon')->nullable();
            $table->String('page_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('transport_area')->nullable();
            $table->string('is_popular')->nullable();
            $table->string('content')->nullable();
            $table->string('city_heading')->nullable();
            $table->string('city_image')->nullable(); 
            $table->string('city_content')->nullable(); 
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('city_master')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tc_url_master');
    }
};
