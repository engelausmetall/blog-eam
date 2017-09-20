<?php

use Faker\Generator as Faker;
//Genere un nuevo factory para creacion de categorias aleatorios
//Siempre llamo a mi funcion factory dependiendo de mi ruta que defino
//factory(App\Core\Entities\Category::class, 50)->create();

//$factory->define(Model::class, function (Faker $faker) {
$factory->define(App\Core\Entities\Category::class, function (Faker $faker) {
    return [
        //faker me permite sacar valores aleatorio
        'name'=>$faker->company,
        'description'=>$faker->address
    ];
});
