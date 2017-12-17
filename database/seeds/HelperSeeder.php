<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 17/12/2017
 * Time: 13:26
 */

trait HelperSeeder {

    protected function getFaker(?string $locale = 'en_EN') {
        return Faker\Factory::create($locale);
    }
}