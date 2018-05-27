<?php

use Illuminate\Database\Seeder;

class SpaTreatmentTypesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spa_treatment_types')->insert([
            'id'         => 1,
            'name'       => 'Hydrotherapy',
            'duration'   => 15,
            'price'      => 30,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('spa_treatment_types')->insert([
            'id'         => 2,
            'name'       => 'Scrubs & Wraps',
            'duration'   => 50,
            'price'      => 90,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('spa_treatment_types')->insert([
            'id'         => 3,
            'name'       => 'Massage',
            'duration'   => 50,
            'price'      => 120,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('spa_treatment_types')->insert([
            'id'         => 4,
            'name'       => 'Facial',
            'duration'   => 50,
            'price'      => 120,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('spa_treatment_types')->insert([
            'id'         => 5,
            'name'       => 'Hands & Feet',
            'duration'   => 50,
            'price'      => 45,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
