<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 100; $i <= 400; $i++) {
            DB::table('rooms')->insert([
                'type_id'          => $faker->numberBetween($min = 1, $max = 9),
                'number'           => $i,
                'capacity'         => $faker->numberBetween($min = 2, $max = 4),
                'disabled_adapted' => $faker->boolean($chanceOfGettingTrue = 90),
                'jacuzzi'          => $faker->boolean($chanceOfGettingTrue = 40),
                'code'             => substr($faker->unique()->hexColor(), 1),
                'status'           => $faker->optional($weight = 0.5, $default = null)->randomElement($array = [0, 1]),
                'created_at'       => new DateTime,
                'updated_at'       => new DateTime,
            ]);
        }
    }
}
