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
        Schema::create('fact_visits', function (Blueprint $table) {
            $table->id(); // ID kunjungan
            $table->unsignedBigInteger('date_id');
            $table->unsignedBigInteger('comic_id');
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('location_id'); 
            $table->unsignedBigInteger('age_id'); 
            $table->string('device', 50); 
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('date_id')->references('id')->on('dim_dates');
            $table->foreign('comic_id')->references('id')->on('dim_comics');
            $table->foreign('user_id')->references('id')->on('dim_users');
            $table->foreign('location_id')->references('id')->on('dim_locations');
            $table->foreign('age_id')->references('id')->on('dim_ages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fact_visits');
    }
};
