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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Basic, Pro, Enterprise
            $table->decimal('price', 15, 0); // Rp 5.000.000
            $table->string('period')->default('/ project'); // / bulan, / tahun
            $table->text('description')->nullable();
            $table->json('features'); // List fitur
            $table->boolean('is_popular')->default(false); // Untuk highlight tengah
            $table->string('cta_link')->nullable(); // Link WhatsApp
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
