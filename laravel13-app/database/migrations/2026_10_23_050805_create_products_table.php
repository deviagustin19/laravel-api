<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Membuat tabel categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Membuat tabel products
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedInteger('harga');
            $table->string('kategori');
            $table->timestamps();
        });

        // Data awal kategori
        $now = now();

        DB::table('categories')->insert([
            ['name' => 'Perlengkapan Tulis', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Makanan dan Minuman', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Fashion', 'created_at' => $now, 'updated_at' => $now],
        ]);

        // Data awal produk
        $awal = [
            ['Buku Tulis', 5000, 'Perlengkapan Tulis'],
            ['Pena', 2000, 'Perlengkapan Tulis'],
            ['Tinta', 3000, 'Perlengkapan Tulis'],
            ['Roti', 10000, 'Makanan dan Minuman'],
            ['Kopi', 2000, 'Makanan dan Minuman'],
            ['Mie Instan', 3000, 'Makanan dan Minuman'],
            ['Kemeja', 150000, 'Fashion'],
            ['Celana', 100000, 'Fashion'],
            ['Sepatu', 250000, 'Fashion'],
        ];

        foreach ($awal as [$nama, $harga, $kategori]) {
            DB::table('products')->insert([
                'nama' => $nama,
                'harga' => $harga,
                'kategori' => $kategori,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
};