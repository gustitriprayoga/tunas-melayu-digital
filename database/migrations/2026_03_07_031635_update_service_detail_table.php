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
        Schema::table('services', function (Blueprint $table) {
            // FAQ disimpan sebagai array JSON [{question: '', answer: ''}]
            $table->json('faqs')->nullable();

            // Tech Stack disimpan sebagai array JSON ['Laravel', 'React', 'AWS']
            $table->json('tech_stack')->nullable();

            // WhatsApp Custom Message (Biar tiap service punya pesan WA beda)
            $table->string('wa_message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            //
        });
    }
};
