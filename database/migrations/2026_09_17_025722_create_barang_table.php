<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('material_code')->unique();
            $table->string('nama_barang');
            $table->decimal('stock_awal', 15, 2)->default(0);
            $table->string('unit');
            $table->decimal('min', 15, 2)->default(0);
            $table->decimal('max', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};