<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: antho
 * Date: 17/12/2017
 * Time: 13:52
 */

class AbonnesAbonnementsTableSeeder extends Seeder {

    use HelperSeeder;

    /**
     * Créer un certain nombre d'abonnés en base de données
     */
    public function run() {
        DB::table('abonnes')->delete();
        DB::table('abonnements')->delete();
        $users = User::all();

        for ($i = 0; $i < 300; $i++) {
            $id1 = $users[$i % sizeof($users)]->id;
            $id2 = $users[$this->choixAbonnement($i, $users)]->id;

            DB::table('abonnes')->insert([
                'user1_id' => $id1,
                'user2_id' => $id2
            ]);

            DB::table('abonnements')->insert([
                'user1_id' => $id2,
                'user2_id' => $id1
            ]);
        }
    }
}