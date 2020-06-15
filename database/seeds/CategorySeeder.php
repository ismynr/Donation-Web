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
            'gambar' => '2020-06-15-03:08:08-2057552916.jpeg'
        ]);
        Category::create([
            'nama_kategori' => 'Sembako',
            'gambar' => '2020-06-15-03:08:20-2114363699.jpeg'
        ]);
        Category::create([
            'nama_kategori' => 'Zakat',
            'gambar' => '2020-06-15-03:04:12-391707044.jpg'
        ]);
        Category::create([
            'nama_kategori' => 'Beras',
            'gambar' => '2020-06-15-03:04:33-805347045.png'
        ]);
        Category::create([
            'nama_kategori' => 'Sandang',
            'gambar' => '2020-06-15-03:06:56-617707716.jpg'
        ]);
        Category::create([
            'nama_kategori' => 'Bahan',
            'gambar' => '2020-06-15-03:07:36-965204944.jpeg'
        ]);
        Category::create([
            'nama_kategori' => 'Pangan',
            'gambar' => '2020-06-15-03:07:47-1430541967.jpg'
        ]);
    }
}
