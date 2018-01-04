<?php

use Illuminate\Support\Collection;

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

    /**
     * Permet de mieux choisir l'index de l'utilisateur
     *
     * @param int $i
     * @param Collection $users
     * @return int
     */
    private function choixAbonnement(int $i, Collection $users): int {
        if ($i < 100) {
            return ($i + 1) % sizeof($users);
        } else if ($i >= 100 && $i < 200) {
            return ($i + 2) % sizeof($users);
        } else {
            return ($i + 3) % sizeof($users);
        }
    }
}