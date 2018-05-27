<?php

use Illuminate\Database\Seeder;

class TripTypesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trip_types')->insert([
            'id'             => 1,
            'name'           => 'Flamenco Passion',
            'location'       => 'Palacio del Flamenco, 139 Balmes Street',
            'max_num_people' => 10,
            'day_week'       => 'Sunday',
            'price'          => 45,
            'created_at'     => new DateTime,
            'updated_at'     => new DateTime,
        ]);

        DB::table('trip_types')->insert([
            'id'             => 2,
            'name'           => 'Montserrat',
            'location'       => 'Monastery of Montserrat',
            'max_num_people' => 20,
            'day_week'       => 'Saturday',
            'price'          => 50,
            'created_at'     => new DateTime,
            'updated_at'     => new DateTime,
        ]);

        DB::table('trip_types')->insert([
            'id'             => 3,
            'name'           => 'Tapas and Wine Experience',
            'location'       => 'Gothic neighborhood',
            'max_num_people' => 10,
            'day_week'       => 'Friday',
            'price'          => 30,
            'created_at'     => new DateTime,
            'updated_at'     => new DateTime,
        ]);

        DB::table('trip_types')->insert([
            'id'             => 4,
            'name'           => 'The Dark History Night Walking Tour in Barcelona',
            'location'       => 'Passeig del Born',
            'max_num_people' => 15,
            'day_week'       => 'Friday',
            'price'          => 25,
            'created_at'     => new DateTime,
            'updated_at'     => new DateTime,
        ]);
    }
}
