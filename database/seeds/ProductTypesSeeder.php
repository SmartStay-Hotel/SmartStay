<?php

use Illuminate\Database\Seeder;

class ProductTypesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->insert([
            'id'         => 1,
            'name'       => 'Lays® Potato Chips',
            'price'      => 1.99,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 2,
            'name'       => 'DORITOS TEX MÉX CHEESE FLAVORED',
            'price'      => 1.99,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 3,
            'name'       => 'Snickers® Candy Bars',
            'price'      => 2.99,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 4,
            'name'       => 'SUNFLOWER SEEDS WITH SALT EL PIPONAZO',
            'price'      => 1.65,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 5,
            'name'       => 'SPANISH BREADSTICKS PICOS CAMPEROS',
            'price'      => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 6,
            'name'       => 'WHOLE GREEN OLIVES ANCHOVY FLAVOUR',
            'price'      => 1.99,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 7,
            'name'       => 'VINO TINTO RESERVA HOYA DE CADENAS',
            'price'      => 30,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 8,
            'name'       => 'Coca-Cola',
            'price'      => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 9,
            'name'       => 'NESTEA WITH LEMON Lata 33 cl',
            'price'      => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 10,
            'name'       => 'Aquarius Sport Drink',
            'price'      => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 11,
            'name'       => 'CLASSICAL BEER "MAHOU"',
            'price'      => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

    }
}
