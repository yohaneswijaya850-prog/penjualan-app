<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('category_id');

            $table->string('nama_produk');

            $table->decimal('harga', 12, 2);

            $table->integer('stok');

            $table->string('gambar')->nullable();

            $table->timestamps();

            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};