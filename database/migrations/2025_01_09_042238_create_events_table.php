<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name', 30);  // Nama event
            $table->unsignedBigInteger('no_whatsapp')->nullable(); // No WhatsApp
            $table->string('description', 255)->nullable(); // Deskripsi singkat
            $table->date('date')->nullable();             // Tanggal pelaksanaan
            $table->date('deadline')->nullable();         // Tanggal penutupan pendaftaran
            $table->string('location', 50)->nullable();  // Lokasi pelaksanaan
            $table->string('image', 255)->nullable();    // Gambar event
            $table->string('status', 10)->nullable();     // Status pendaftaran
            $table->timestamps();             // Created_at dan Updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
