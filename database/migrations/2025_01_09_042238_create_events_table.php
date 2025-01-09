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
            $table->unsignedBigInteger('no_whatsapp'); // No WhatsApp
            $table->string('description', 50); // Deskripsi singkat
            $table->date('date');             // Tanggal pelaksanaan
            $table->string('status', 10);     // Status pendaftaran
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
