<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 03/01/2018
 * Time: 17:32
 */

use Faker\Generator as Faker;

$factory->define(App\Attachement::class, function (Faker $faker) {
    return [
        'name' => $faker->name . '.jpg',
        'attachable_id' => $faker->randomDigitNotNull,
        'attachable_type' => $faker->name
    ];
});