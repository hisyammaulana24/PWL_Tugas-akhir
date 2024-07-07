<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_products');
            $table->text('deskripsi_products');
            $table->decimal('harga_products', 8, 2); // Menggunakan decimal untuk harga dengan presisi 8 total digit dan 2 digit di belakang koma
            $table->string('gambar_products')->nullable();
            $table->timestamps();
            // Foreign key constraint (jika ada)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
