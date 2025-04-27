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
        Schema::create('aerobe_academies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->json('tag_id'); // Storing array as JSON
            $table->integer('category_id');
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('author_name')->nullable();;
            $table->string('author_image')->nullable();
            $table->date('event_date')->nullable();
            $table->integer('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aerobe_academies');
    }
};
