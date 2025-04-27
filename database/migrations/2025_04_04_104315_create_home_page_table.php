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
        Schema::create('home_page', function (Blueprint $table) {
            $table->id();
            $table->string('banner_title');
            $table->string('banner_image');
            $table->text('banner_desc')->nullable();
            $table->string('banner_button_text')->nullable();

            $table->string('section_heading');
            $table->string('section_title');
            $table->string('section_image1')->nullable();
            $table->string('section_image2')->nullable();
            $table->string('section_image3')->nullable();
            $table->text('section_desc')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page');
    }
};
