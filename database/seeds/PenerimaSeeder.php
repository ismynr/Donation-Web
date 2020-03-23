<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PenerimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data penerima
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 10; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('penerima')->insert([
    			'nama' => $faker->name,
    			'alamat' => $faker->address,
    			'tgl_lahir' => $faker->date($format = 'Y-m-d'),
    			'jenkel' => $faker->randomElement($array = array ('p','l')),
    			'umur' => $faker->numberBetween(25,40),
    			'jumkel' => $faker->numberBetween(5,8),
    			'penghasilan' => $faker->numberBetween(700000,1200000)
    		]);
 
    	}
    }
}
