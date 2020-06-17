<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\LayananPublic;
use App\Donatur;

class LayananPublicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $donatur = Donatur::all();

        // SEEDER Y BELOOM
        for ($i=0; $i < 25; $i++) { 
            $randomdonatur = $faker->randomElement($donatur);

            LayananPublic::create([
                'id_donatur' => $randomdonatur->id_donatur,
                'subject' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'nama' => $randomdonatur->nama_depan . ' ' . $randomdonatur->nama_belakang,
                'email' => $randomdonatur->email,
                'pesan' => $faker->realText($maxNbChars = 200, $indexSize = 2)
            ]);
        }
    }
}
