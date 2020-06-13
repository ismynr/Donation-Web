<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Donatur;
use App\User;

class DonaturSeeder extends Seeder
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

    	    // INSERT DATA USER LOGIN DONATUR
            // setiap donatur punya 1 akun untuk meelihat donasinya
            // jadi menambahkan user dengan role "donatur"
            $ambilEmailFaker = $faker->unique()->email;
            $ambilnamaDepanFaker = $faker->firstName;
            $ambilnamaBlkgFaker = $faker->lastName;

            $user = User::create([
                'name' => $ambilnamaDepanFaker . ' ' . $ambilnamaBlkgFaker,
                'role' => 'donatur',
                'email' => $ambilEmailFaker,
                'password' => Hash::make($ambilEmailFaker)
            ]);

            // INSERT DATA DONATUR
            // dan menyertakan data donatur yang terhubung dengan akun user diatas
    		Donatur::create([
                'id_user' => $user->id,
    			'nama_depan' => $ambilnamaDepanFaker,
                'nama_belakang' => $ambilnamaBlkgFaker,
                'email' => $user->email,
                'no_hp' => $faker->numberBetween(25,40),
                'alamat' => $faker->address,
                'umur' => $faker->numberBetween(25,40)
    		]);

    	}
    }
}
