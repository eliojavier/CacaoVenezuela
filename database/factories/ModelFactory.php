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

//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    static $password;
//
//    return [
//        'name' => $faker->name,
//        'email' => $faker->safeEmail,
//        'password' => $password ?: $password = bcrypt('secret'),
//        'remember_token' => str_random(10),
//    ];
//});

$factory->define(App\Judge::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->e164PhoneNumber,
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'doc_id' => $faker->ean8,
        'password' => bcrypt('123456'),
        'birthday' => $faker->date,
        'phone' => $faker->e164PhoneNumber,
        'address' => $faker->address,
        'twitter' => $faker->firstName,
        'instagram' => $faker->firstName,
        'size' => $faker->randomElement($array = array ('XS', 'S','M','L', 'XL', 'XXL')),
        'category' => $faker->randomElement($array = array ('Aficionado/Público General','Estudiante/Profesional')),
        'type' => $faker->randomElement($array = array ('N/A', 'Oficiante', 'Estudiante en curso', 'Egresado')),
        'city_id' => $faker->numberBetween($min = 1, $max = 24),
        'academy_id' => $faker->numberBetween($min = 1, $max = 72),
    ];
});

$factory->define(App\Recipe::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'modality' => $faker->randomElement($array = array ('Dulce','Salado')),
        'preparation' => $faker->paragraph,
        'serves' => $faker->numberBetween($min = 1, $max = 20),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'user_id' => $faker->numberBetween($min = 1, $max = 51),
    ];
});

$factory->define(App\Criterion::class, function (Faker\Generator $faker) {

    return [
        'phase' => $faker->numberBetween($min = 1, $max = 3),
        'criterion' => $faker->word,
    ];
});
