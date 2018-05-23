<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_types')->insert([
            'id'          => 1,
            'name'        => 'Single',
            'description' => 'A room assigned to one person. May have one or more beds.',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('room_types')->insert([
            'id'          => 2,
            'name'        => 'Double',
            'description' => 'A room assigned to two people. May have one or more beds.',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('room_types')->insert([
            'id'          => 3,
            'name'        => 'Triple',
            'description' => 'A room assigned to three people. May have two or more beds.',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('room_types')->insert([
            'id'          => 4,
            'name'        => 'Quad',
            'description' => 'A room assigned to four people. May have two or more beds.',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('room_types')->insert([
            'id'          => 5,
            'name'        => 'Queen',
            'description' => 'A room with a queen-sized bed. May be occupied by one or more people.',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('room_types')->insert([
            'id'          => 6,
            'name'        => 'King',
            'description' => 'A room with a king-sized bed. May be occupied by one or more people.',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('room_types')->insert([
            'id'          => 7,
            'name'        => 'Twin',
            'description' => 'A room with two beds. May be occupied by one or more people.',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('room_types')->insert([
            'id'          => 8,
            'name'        => 'Double-double',
            'description' => 'A room with two double (or perhaps queen) beds. May be occupied by one or more people.',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

        DB::table('room_types')->insert([
            'id'          => 9,
            'name'        => 'Master Suite',
            'description' => 'A parlour or living room connected to one or more bedrooms.',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime,
        ]);

    }
}
