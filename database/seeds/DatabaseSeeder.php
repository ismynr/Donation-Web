<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [   
                CategorySeeder::class,
                PenerimaSeeder::class,
                DonaturSeeder::class,
                PengurusSeeder::class,
                UserSeeder::class,
                DonasiSeeder::class,
                LayananPublicsSeeder::class,
            ]
        );
    }
}
