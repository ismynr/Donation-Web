<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Pengurus;
use App\User;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 25; $i++){

            // INSERT DATA USER LOGIN PENGURUS
            // setiap pengurus punya 1 akun untuk mengelolanya
            // jadi menambahkan user dengan role "pengurus"
            $ambilEmailFaker = $faker->unique()->email;

            $user = User::create([
                'name' => $faker->name,
                'role' => 'pengurus',
                'email' => $ambilEmailFaker,
                'password' => Hash::make($ambilEmailFaker)
            ]);

            // INSERT DATA PENGURUS
            // dan menyertakan data pengurus yang terhubung dengan akun user diatas
            Pengurus::create([
                'id_user' => $user->id,
                'nip' => $faker->numberBetween(100000,1200000),
    			'nama' => $user->name,
                'jabatan' => $faker->JobTitle
            ]);

    	}
    }
}
