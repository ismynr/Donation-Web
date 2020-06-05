<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Donasi;
use App\Category;
use App\Penerima;
use App\Donatur;

class DonasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $id_kategori = Category::all()->pluck('id_kategori')->toArray();
        $id_penerima = Penerima::all()->pluck('id_penerima')->toArray();
        $id_donatur = Donatur::all()->pluck('id_donatur')->toArray();

        for ($i=0; $i < 25; $i++) { 
            Donasi::create([
                'id_kategori' => $faker->randomElement($id_kategori),
                'id_penerima' => $faker->randomElement($id_penerima),
                'id_donatur' => $faker->randomElement($id_donatur),
                'jumlah_donasi' => $faker->numberBetween(100000,50000000),
                'tanggal_memberi' => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }
    }
}
