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
        Schema::create('social_links', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., 'GitHub'
            $table->string('url');
            $table->string('icon'); // Heroicon name
            $table->string('color')->default('#ffffff'); // Warna brand (e.g., #5865F2 untuk Discord)
            $table->string('username')->nullable(); // Text yang tampil
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_links');
    }
};
