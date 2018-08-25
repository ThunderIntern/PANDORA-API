<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use Faker\Generator as Faker;

$factory->define(App\Barang::class, function (Faker $faker) {
    return [
        
        'nama' => $faker->name,
        'sku' => str_random(3),
        'berat'=>rand(1000,5000),
        'dimensi'=>'{ "panjang":"3", "lebar":"5" ,"tinggi":"10" }',
        'deskripsi' =>  str_random(10),

    ];
});
$factory->define(App\Pricing::class, function (Faker $faker) {
    return [
                'nama' => $faker->name,
        'sku' => str_random(3),
        'berat'=>rand(1000,5000),
        'dimensi'=>'{ "panjang":"3", "lebar":"5" ,"tinggi":"10" }',
        'deskripsi' =>  str_random(10),

    ];
});
