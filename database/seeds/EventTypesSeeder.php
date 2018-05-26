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
            'created_at'     => new DateTime,
            'updated_at'     => new DateTime,
        ]);

        DB::table('event_types')->insert([
            'id'             => 2,
            'name'           => 'Storytelling with Magic',
            'location'       => 'Childrens Room',
            'max_num_people' => 15,
            'day_week'       => 'Every Day',
            'created_at'     => new DateTime,
            'updated_at'     => new DateTime,
        ]);

        DB::table('event_types')->insert([
            'id'             => 3,
            'name'           => 'Aquatic Zumba',
            'location'       => 'Main pool',
            'max_num_people' => 20,
            'day_week'       => 'Thursday',
            'created_at'     => new DateTime,
            'updated_at'     => new DateTime,
        ]);

        DB::table('event_types')->insert([
            'id'             => 4,
            'name'           => 'Wine Tasting',
            'location'       => 'Underground floor wineries',
            'max_num_people' => 10,
            'day_week'       => 'Saturday',
            'created_at'     => new DateTime,
            'updated_at'     => new DateTime,
        ]);

        DB::table('event_types')->insert([
            'id'             => 5,
            'name'           => 'Tea Workshop',
            'location'       => 'Workshop room 1',
            'max_num_people' => 10,
            'day_week'       => 'Monday',
            'created_at'     => new DateTime,
            'updated_at'     => new DateTime,
        ]);

        DB::table('event_types')->insert([
            'id'             => 6,
            'name'           => 'Theatre Shows',
            'location'       => 'Main theatre',
            'max_num_people' => 35,
            'day_week'       => 'Wednesday',
            'created_at'     => new DateTime,
            'updated_at'     => new DateTime,
        ]);
    }
}
