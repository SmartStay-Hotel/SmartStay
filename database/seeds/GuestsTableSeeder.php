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
        $fakerUS = Faker::create('en_US');
        $fakerES = Faker::create('es_Es');

        for ($i = 1; $i <= 38; $i++) {
            for ($x = 0; $x < 2; $x++) {
                DB::table('guests')->insert([
                    'firstname'  => $fakerUS->firstName($gender = 'female' | 'male'),
                    'lastname'   => $fakerUS->lastName,
                    'nif'        => $fakerES->unique()->dni,
                    'email'      => $fakerUS->unique()->email,
                    'telephone'  => $fakerUS->unique()->phoneNumber,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ]);
            }

            for ($y = 0; $y < 2; $y++) {
                DB::table('guests')->insert([
                    'firstname'  => $fakerES->firstName($gender = 'female' | 'male'),
                    'lastname'   => $fakerES->lastName,
                    'nif'        => $fakerES->unique()->dni,
                    'email'      => $fakerES->unique()->email,
                    'telephone'  => $fakerES->unique()->phoneNumber,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ]);
            }
        }
    }
}
