<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // user untuk login admin hanya 1 orang yang megang
        User::create([
            'name' => 'admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);

        // untuk user login dengan role "pengurus" dan "donatur", bisa cek di seeder 
        // PengurusSeeder dan DonaturSeeder



        // user untuk login pengurus
        // $user = User::create([
        //     'name' => 'pengurus',
        //     'role' => 'pengurus',
        //     'email' => 'pengurus@gmail.com',
        //     'password' => Hash::make('pengurus'),
        // ]);

        // dan membuat 1 data pengurus 
        // untuk login register 
        //jadi cuma 1 pengurus dulu yang menjadi admin pengelola sistem
        // Pengurus::create([
        //     'nip' => '1291846223746',
        //     'id_user' => $user->id, //ambil id user yang baru diinputin brrti diatas
    	// 	'nama' => 'pengurus',
        //     'jabatan' => 'pengurus admin'
        // ]);

        
    }
}
