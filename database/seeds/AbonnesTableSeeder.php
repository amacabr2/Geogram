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

class AbonnesTableSeeder extends Seeder {

    use HelperSeeder;

    /**
     * Créer un certain nombre d'abonnés en base de données
     */
    public function run() {
        DB::table('abonnes')->delete();

        $users = User::all();

        for ($i = 0; $i < 300; $i++) {
            DB::table('abonnes')->insert([
                'user1_id' => $users[$i % sizeof($users)]->id,
                'user2_id' => $users[($i + 2) % sizeof($users)]->id
            ]);
        }
    }
}