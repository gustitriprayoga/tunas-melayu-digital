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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            // Section: Hero (Bagian Atas)
            $table->string('hero_title'); // Contoh: "Solusi Digital Masa Depan"
            $table->text('hero_subtitle')->nullable();
            $table->string('cta_text')->default('Hubungi Kami'); // Tombol aksi
            $table->string('cta_link')->nullable();

            // Section: Stats (Angka-angka)
            $table->integer('stats_clients')->default(0);
            $table->integer('stats_projects')->default(0);
            $table->integer('stats_years')->default(0);

            // Section: Video/About
            $table->string('video_url')->nullable(); // Youtube link

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
