<?php

use App\User;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: antho
 * Date: 17/12/2017
 * Time: 10:52
 */

class UsersTableSeeder extends Seeder {

    use HelperSeeder;

    /**
     * Créer un certain nombre d'utilisateurs en base de données
     */
    public function run() {
        User::truncate();

        $facebook = [
            'https://www.facebook.com/nutellafrance/?ref=br_rs&brand_redir=78933666629',
            'https://www.facebook.com/search/top/?q=m%26m%27s%20france',
            'https://www.facebook.com/search/top/?q=walking%20dead',
            'https://www.facebook.com/StarWars.fr/?brand_redir=169299103121699',
            'https://www.facebook.com/groups/DBSFRANCE/?hc_ref=ARQap8m5MQJB1aLcR0qZkYV_8a26THrQ72hlvGVem_MGruz8TnO9dv0ybuqcjCuIDWQ'
        ];

        $instagram = [
            'https://www.instagram.com/nutella/?hl=fr',
            'https://www.instagram.com/mmsfrance/?hl=fr',
            'https://www.instagram.com/amcthewalkingdead/?hl=fr',
            'https://www.instagram.com/starwars/?hl=fr',
            'https://www.instagram.com/dragonballsuper_/?hl=fr'
        ];

        $twitter = [
            'https://twitter.com/NutellaGlobal',
            'https://twitter.com/mmschocolate',
            'https://twitter.com/WalkingDead_AMC',
            'https://twitter.com/StarWarsFR',
            'https://twitter.com/DBSuperTV'
        ];

        $google = [
            'https://plus.google.com/communities/105491536044578792544',
            'https://plus.google.com/collection/07SZv',
            'https://plus.google.com/communities/105546225300136115183',
            'https://plus.google.com/+StarWars',
            'https://plus.google.com/communities/113382780540555571875'
        ];

        for ($i = 0; $i < 100; $i++) {
            $randomSex = random_int(0, 1);
            $firstName = $randomSex ? $this->getFaker()->firstNameMale : $this->getFaker()->firstNameFemale;
            $lastName = $this->getFaker()->lastName;

            User::create([
                'pseudo' => $this->getFaker()->userName,
                'lastName' => $lastName,
                'firstName' => $firstName,
                'sexe' => $randomSex ? "homme" : "femme",
                'email' => $firstName . "." . $lastName . "@gmail.com",
                'password' => $firstName . "_" . $lastName,
                'state' => $this->getFaker()->country,
                'codePostal' => (int)$this->getFaker()->postcode,
                'adresse' => $this->getFaker()->address,
                'birthDate' => $this->getFaker()->date('Y-m-d', 'now'),
                'description' => $this->getFaker()->text(200),
                'avatar' => $this->getFaker()->imageUrl($width = 240, $height = 280),
                'couverture' => $this->getFaker()->imageUrl($width = 1400, $height = 800),
                'job' => $this->getFaker()->jobTitle,
                'lienFacebook' => $facebook[$i % 5],
                'lienInstagram' => $instagram[$i % 5],
                'lienTwitter' => $twitter[$i % 5],
                'lienGoogle' => $google[$i % 5]
            ]);
        }
    }
}