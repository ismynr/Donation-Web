<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Pengurus;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'pengurus',
            'role' => 'pengurus',
            'email' => 'pengurus@gmail.com',
            'password' => Hash::make('pengurus'),
        ]);
        // dan membuat 1 data pengurus 
        // untuk login register 
        //jadi cuma 1 pengurus dulu yang menjadi admin pengelola sistem
        Pengurus::create([
            'nip' => '1291846223746',
            'id_user' => $user->id, //ambil id user yang baru diinputin brrti diatas
    		'nama' => 'pengurus',
            'jabatan' => 'pengurus admin'
        ]);
    }
}
