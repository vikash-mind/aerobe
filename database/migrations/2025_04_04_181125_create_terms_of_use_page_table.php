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
        Schema::create('terms_of_use_page', function (Blueprint $table) {
            $table->id();
            $table->string('header_heading');
            $table->string('header_title')->nullable();
            $table->text('header_image')->nullable();
            $table->text('header_desc')->nullable();
           
            $table->text('terms_desc')->nullable();

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
        Schema::table('terms_of_use_page', function (Blueprint $table) {
            //
        });
    }
};
