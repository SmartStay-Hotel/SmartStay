<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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

        for ($i=0; $i < 50; $i++) {
            \DB::table('rooms')->insert(array(
                'number' => $faker->firstNameFemale,
                'capacity' => $faker->firstNameFemale,
                'disable_dapted' => $faker->firstNameFemale,
                'jacuzzi' => $faker->boolean(true, 50), //No creo que esté bien
                'code'  => $faker->numberBetween($min = 1000, $max = 5000),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
