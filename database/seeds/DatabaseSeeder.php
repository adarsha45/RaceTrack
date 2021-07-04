<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * NOTE: you may get an error when running php artisan db:seed. If so you need to run composer dump-autoload
     * to regenerate composers autoloader as per https://laravel.com/docs/7.x/seeding#running-seeders
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(DriversSeeder::class);
        $this->call(CarsSeeder::class);
        $this->call(TracksSeeder::class);
        $this->call(TrackLayoutSeeder::class);
        $this->call(CarConfigurationSeeder::class);
        $this->call(LapsSeeder::class);
    }
}
