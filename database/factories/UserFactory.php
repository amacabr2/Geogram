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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    $randomSex = random_int(0, 1);
    $firstName = $randomSex ? $faker->firstNameMale : $faker->firstNameFemale;
    $lastName = $faker->lastName;

    return [
        'pseudo' => "$firstName.$lastName",
        'lastName' => $lastName,
        'firstName' => $firstName,
        'sexe' => $randomSex ? "homme" : "femme",
        'email' => $firstName . "." . $lastName . "@gmail.com",
        'password' => bcrypt( "azerty"),
        'state' => $faker->country,
        'codePostal' => (int)$faker->postcode,
        'adresse' => $faker->address,
        'birthDate' => $faker->date('Y-m-d', 'now'),
        'description' => $faker->text(200),
        'avatar' => null,
        'couverture' => null,
        'job' => $faker->jobTitle,
        'lienFacebook' => 'azerty',
        'lienInstagram' => 'azerty',
        'lienTwitter' => 'azerty',
        'lienGoogle' => 'azerty',
        'remember_token' => str_random(60)
    ];
});
