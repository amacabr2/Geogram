<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: antho
 * Date: 17/12/2017
 * Time: 13:40
 */

class AbonnementsSeeder extends Seeder {

    use HelperSeeder;

    public function run() {
        DB::table('abonnements')->delete();
        $users = User::all();

        for ($i = 0; $i < 300; $i++) {
            DB::table('abonnements')->insert([
                'user1_id' => $users[$i % sizeof($users)]->id,
                'user2_id' => $users[($i + 1) % sizeof($users)]->id
            ]);
        }
    }
}