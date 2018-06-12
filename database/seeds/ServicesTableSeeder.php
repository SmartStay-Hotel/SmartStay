<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'id'          => '1',
            'name'        => 'Restaurant',
            'description' => 'Restaurant description',
            'image'       => '/img/home_services/restaurant.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('services')->insert([
            'id'          => '2',
            'name'        => 'Snacks and drinks',
            'description' => 'Snacks and drinks description',
            'image'       => '/img/home_services/snack.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('services')->insert([
            'id'          => '3',
            'name'        => 'Spa',
            'description' => 'Spa description',
            'image'       => '/img/home_services/spa.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('services')->insert([
            'id'          => '4',
            'name'        => 'Alarm',
            'description' => 'Alarm description',
            'image'       => '/img/home_services/alarm.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('services')->insert([
            'id'          => '5',
            'name'        => 'Pet care',
            'description' => 'Pet care description',
            'image'       => '/img/home_services/petCare.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('services')->insert([
            'id'          => '6',
            'name'        => 'Trip',
            'description' => 'Trip description',
            'image'       => '/img/home_services/Trip.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('services')->insert([
            'id'          => '7',
            'name'        => 'Event',
            'description' => 'Event description',
            'image'       => '/img/home_services/event.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('services')->insert([
            'id'          => '8',
            'name'        => 'Taxi',
            'description' => 'Taxi description',
            'image'       => '/img/home_services/taxi.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('services')->insert([
            'id'          => '9',
            'name'        => 'Housekeeping',
            'description' => 'Housekeeping description',
            'image'       => '/img/home_services/Housekeeping.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);


    }
}
