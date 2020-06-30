<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'nama_kategori' => 'Uang',
        ]);
        Category::create([
            'nama_kategori' => 'Sembako',
        ]);
        Category::create([
            'nama_kategori' => 'Zakat',
        ]);
        Category::create([
            'nama_kategori' => 'Beras',
        ]);
        Category::create([
            'nama_kategori' => 'Sandang',
        ]);
        Category::create([
            'nama_kategori' => 'Bahan',
        ]);
        Category::create([
            'nama_kategori' => 'Pangan',
        ]);
    }
}
