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
        $this->call(CategorySeeder::class);
        $this->call(PenerimaSeeder::class);
        $this->call(DonaturSeeder::class);
        $this->call(PengurusSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DonasiSeeder::class);

        // hanya cadangan
        //php artisan db:seed --class=CategorySeeder
        //php artisan db:seed --class=PenerimaSeeder
        //php artisan db:seed --class=DonaturSeeder
        //php artisan db:seed --class=PengurusSeeder
        //php artisan db:seed --class=UserSeeder
        //php artisan db:seed --class=DonasiSeeder
    }
}
