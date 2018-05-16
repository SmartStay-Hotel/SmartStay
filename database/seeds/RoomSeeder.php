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
                'nombre' => $faker->firstNameFemale,
                'code'  => $faker->numberBetween($min = 1000, $max = 5000),
                'jacuzzi' => $faker->boolean(true, 50), //No creo que esté bien
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
