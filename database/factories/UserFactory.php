<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
//Esto me sirve para generar data de prueba en la tabla USER, tambien puedo ejecutar la funcion por consola
// de la siguiente manera: factory(App\User::class, 50)->create();
//Si vuelvo a ejecutar por segunda vez el comando me puede dar error porque se repita el e-mail
//Como el e-mail es unico
$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        //aqui defino las contraseña por default al crear usuario aleatorios
        'password' => $password ?: $password = bcrypt('1234567'),
        'remember_token' => str_random(10),
    ];
});
