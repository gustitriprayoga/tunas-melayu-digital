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
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title');
            $table->text('hero_subtitle');
            $table->text('story_content'); // Sejarah singkat
            $table->text('vision');
            $table->text('mission'); // Bisa HTML list
            $table->json('core_values'); // Array: ['Innovation', 'Integrity', etc]
            $table->string('founded_year')->default('2020');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};
