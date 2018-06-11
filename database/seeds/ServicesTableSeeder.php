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
            'name'        => 'Snacks And Drinks',
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
    }
}
