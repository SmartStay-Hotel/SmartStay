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
            'type_id'    => 1,
            'image'      => '/img/home_services/snackdrink/lays.jpg',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 2,
            'name'       => 'DORITOS TEX MÉX CHEESE FLAVORED',
            'price'      => 1.99,
            'type_id'    => 1,
            'image'      => '/img/home_services/snackdrink/doritos.jpg',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 3,
            'name'       => 'Snickers® Candy Bars',
            'price'      => 2.99,
            'type_id'    => 1,
            'image'      => '/img/home_services/snackdrink/snickers.jpg',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 4,
            'name'       => 'SUNFLOWER SEEDS WITH SALT EL PIPONAZO',
            'price'      => 1.65,
            'type_id'    => 1,
            'image'      => '/img/home_services/snackdrink/pipas.jpg',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 5,
            'name'       => 'SPANISH BREADSTICKS PICOS CAMPEROS',
            'price'      => 1,
            'type_id'    => 1,
            'image'      => '/img/home_services/snackdrink/breadsticks.jpg',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 6,
            'name'       => 'WHOLE GREEN OLIVES ANCHOVY FLAVOUR',
            'price'      => 1.99,
            'type_id'    => 1,
            'image'      => '/img/home_services/snackdrink/olives.jpg',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 7,
            'name'       => 'RED WINE RESERVE HOYA DE CADENAS',
            'price'      => 30,
            'type_id'    => 2,
            'image'      => '/img/home_services/snackdrink/wine.jpg',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 8,
            'name'       => 'Coca-Cola',
            'price'      => 1,
            'type_id'    => 2,
            'image'      => '/img/home_services/snackdrink/coke.jpg',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 9,
            'name'       => 'NESTEA WITH LEMON Lata 33 cl',
            'price'      => 1,
            'type_id'    => 2,
            'image'      => '/img/home_services/snackdrink/nestea.jpg',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 10,
            'name'       => 'Aquarius Sport Drink',
            'price'      => 1,
            'type_id'    => 2,
            'image'      => '/img/home_services/snackdrink/aquarius.jpg',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('product_types')->insert([
            'id'         => 11,
            'name'       => 'CLASSICAL BEER "MAHOU"',
            'price'      => 1,
            'type_id'    => 2,
            'image'      => '/img/home_services/snackdrink/mahou.jpg',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

    }
}
