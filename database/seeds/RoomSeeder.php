<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 100; $i <= 150; $i++) {
            DB::table('rooms')->insert([
                'type_id'          => $faker->numberBetween($min = 1, $max = 9),
                'number'           => $i,
                'capacity'         => $faker->numberBetween($min = 2, $max = 6),
                'disabled_adapted' => $faker->boolean($chanceOfGettingTrue = 90),
                'jacuzzi'          => $faker->boolean($chanceOfGettingTrue = 90),
                'code'             => $faker->password(6, 6),
                'status'           => $faker->boolean($chanceOfGettingTrue = 90),
                'created_at'       => new DateTime,
                'updated_at'       => new DateTime,
            ]);
        }

        for ($i = 200; $i <= 250; $i++) {
            DB::table('rooms')->insert([
                'type_id'          => $faker->numberBetween($min = 1, $max = 9),
                'number'           => $i,
                'capacity'         => $faker->numberBetween($min = 2, $max = 6),
                'disabled_adapted' => $faker->boolean($chanceOfGettingTrue = 90),
                'jacuzzi'          => $faker->boolean($chanceOfGettingTrue = 90),
                'code'             => $faker->password(6, 6),
                'created_at'       => new DateTime,
                'updated_at'       => new DateTime,
            ]);
        }

        for ($i = 300; $i <= 350; $i++) {
            DB::table('rooms')->insert([
                'type_id'          => $faker->numberBetween($min = 1, $max = 9),
                'number'           => $i,
                'capacity'         => $faker->numberBetween($min = 2, $max = 6),
                'disabled_adapted' => $faker->boolean($chanceOfGettingTrue = 90),
                'jacuzzi'          => $faker->boolean($chanceOfGettingTrue = 90),
                'code'             => $faker->password(6, 6),
                'created_at'       => new DateTime,
                'updated_at'       => new DateTime,
            ]);
        }
    }
}
