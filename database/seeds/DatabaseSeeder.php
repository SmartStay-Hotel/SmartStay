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
        $this->call(ServicesTableSeeder::class);
        $this->call(RoomTypesTableSeeder::class);
        $this->call(RoomsSeeder::class);
        $this->call(GuestsTableSeeder::class);
        $this->call(SpaTreatmentTypesSeeder::class);
        $this->call(ProductTypesSeeder::class);
        $this->call(TripTypesSeeder::class);
        $this->call(EventTypesSeeder::class);
    }
}