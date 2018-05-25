<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GuestsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_Es');

        for ($i = 1; $i <= 10; $i++) {
            DB::table('guests')->insert([
                'firstname'  => $faker->firstName($gender = 'female' | 'male'),
                'lastname'   => $faker->lastName,
                'nie'        => $faker->dni,
                'email'      => $faker->email,
                'telephone'  => $faker->phoneNumber,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]);
        }
    }
}
