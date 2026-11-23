<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Perlengkapan Tulis',
            'Makanan dan Minuman',
            'Fashion',
            'Elektronik',
            'Peralatan Rumah Tangga',
        ];

        foreach ($categories as $nama) {
            Category::firstOrCreate([
                'nama' => $nama
            ]);
        }
    }
}
