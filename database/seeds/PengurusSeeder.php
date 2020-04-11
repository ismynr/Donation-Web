<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Pengurus;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert data pengurus
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 100; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('pengurus')->insert([
                'nip' => $faker->numberBetween(100000,1200000),
    			'nama' => $faker->name,
                'jabatan' => $faker->JobTitle
            ]);
    	}
    }
}
