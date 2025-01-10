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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);  // Nama produk
            $table->string('image', 255)->nullable(); // Gambar produk
            $table->string('description', 255)->nullable(); // Deskripsi produk
            $table->string('category', 50)->nullable(); // Kategori produk
            $table->decimal('price', 10, 2)->nullable(); // Harga produk
            $table->integer('stock')->nullable(); // Stok produk
            $table->string('status', 50)->nullable(); // Status produk
            $table->timestamps(); // Created_at dan Updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
