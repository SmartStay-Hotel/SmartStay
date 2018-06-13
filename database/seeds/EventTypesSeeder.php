<?php

use Illuminate\Database\Seeder;

class EventTypesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_types')->insert([
            'id'             => 1,
            'name'           => 'Music Concert',
            'location'       => 'Concert Hall',
            'max_num_people' => 150,
            'day_week'       => 'Friday',
            'image'          => '/img/home_services/event/concertHall.jpg',
            'created_at'     => new DateTime,
            'updated_at'     => new DateTime,
        ]);

        DB::table('event_types')->insert([
            'id'             => 2,
            'name'           => 'Storytelling with Magic',
            'location'       => 'Children Room',
            'max_num_people' => 15,
            'day_week'       => 'Every Day',
            'image'          => '/img/home_services/event/childrenRoom.jpg',
            'created_at'     => new DateTime,
            'updated_at'     => new DateTime,
        ]);

        DB::table('event_types')->insert([
            'id'             => 3,
            'name'           => 'Aquatic Zumba',
            'location'       => 'Main Pool',
            'max_num_people' => 20,
            'day_week'       => 'Thursday',
            'image'          => '/img/home_services/event/mainPool.jpg',
            'created_at'     => new DateTime,
            'updated_at'     => new DateTime,
        ]);

        DB::table('event_types')->insert([
            'id'             => 4,
            'name'           => 'Wine Tasting',
            'location'       => 'Underground Floor Wineries',
            'max_num_people' => 10,
            'day_week'       => 'Saturday',
            'image'          => '/img/home_services/event/floorWineries.jpg',
            'created_at'     => new DateTime,
            'updated_at'     => new DateTime,
        ]);

        DB::table('event_types')->insert([
            'id'             => 5,
            'name'           => 'Tea Workshop',
            'location'       => 'Workshop Room 1',
            'max_num_people' => 10,
            'day_week'       => 'Monday',
            'image'          => '/img/home_services/event/workshopRoom1.jpg',
            'created_at'     => new DateTime,
            'updated_at'     => new DateTime,
        ]);

        DB::table('event_types')->insert([
            'id'             => 6,
            'name'           => 'Theatre Shows',
            'location'       => 'Main theatre',
            'max_num_people' => 35,
            'day_week'       => 'Wednesday',
            'image'          => '/img/home_services/event/mainTheatre.jpg',
            'created_at'     => new DateTime,
            'updated_at'     => new DateTime,
        ]);
    }
}
