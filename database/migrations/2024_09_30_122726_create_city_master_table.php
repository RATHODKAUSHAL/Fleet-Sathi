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
        Schema::create('city_master', function (Blueprint $table) {
            $table->id();
            $table->string('city_name')->nullable();
            $table->string('state_name')->nullable();
            $table->foreignId('state_id')->nullable();  
            $table->timestamps();
            $table->foreign('state_id')->references('id')->on('state_master')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_master');
    }
};
