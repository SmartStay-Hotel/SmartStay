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
            'description' => 'Try a Fancy Dish From Our International Cuisine',
            'image'       => '/img/home_services/restaurant.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('services')->insert([
            'id'          => '2',
            'name'        => 'Snacks and drinks',
            'description' => 'The Best Snacks for Whatever You are Craving',
            'image'       => '/img/home_services/snack.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('services')->insert([
            'id'          => '3',
            'name'        => 'Spa',
            'description' => 'Enjoy a Peaceful Break and Leave Your Troubles Behind',
            'image'       => '/img/home_services/spa.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('services')->insert([
            'id'          => '4',
            'name'        => 'Alarm',
            'description' => 'Do not Start off on the Wrong Foot! Let Us Wake You Up',
            'image'       => '/img/home_services/alarm.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('services')->insert([
            'id'          => '5',
            'name'        => 'Pet care',
            'description' => 'We Can Take Care of Your Furry Friend',
            'image'       => '/img/home_services/petCare.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('services')->insert([
            'id'          => '6',
            'name'        => 'Trip',
            'description' => 'Choose One of Our Unforgettable Trips',
            'image'       => '/img/home_services/Trip.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('services')->insert([
            'id'          => '7',
            'name'        => 'Event',
            'description' => 'Enjoy Our Incoming Events',
            'image'       => '/img/home_services/event.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('services')->insert([
            'id'          => '8',
            'name'        => 'Taxi',
            'description' => 'We Do Not Want You to Go Away, but We Can Help You Calling a Taxi',
            'image'       => '/img/home_services/taxi.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('services')->insert([
            'id'          => '9',
            'name'        => 'Housekeeping',
            'description' => 'Let Us Take Care Of Your Stay',
            'image'       => '/img/home_services/Housekeeping.jpg',
            'is_active'   => '1',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);


    }
}
