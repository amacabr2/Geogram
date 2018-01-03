<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 03/01/2018
 * Time: 12:34
 */

use Faker\Generator as Faker;

$factory->define(App\Voyage::class, function (Faker $faker) {
    return [
        'state' => 'France',
        'longitude' => '12.12345',
        'latitude' => '12.12345',
        'dateBegin' => '2017-03-03',
        'dateEnd' => '2017-03-10',
        'user_id' => 1
    ];
});