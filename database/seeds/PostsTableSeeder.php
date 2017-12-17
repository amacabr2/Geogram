<?php

use App\Post;
use App\User;
use App\Voyage;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: antho
 * Date: 17/12/2017
 * Time: 13:55
 */

class PostsTableSeeder extends Seeder {

    use HelperSeeder;

    /**
     * Créer un certain nombre de posts en base de données
     */
    public function run() {
        Post::truncate();

        $users = User::all();
        $voyages = Voyage::all();

        for ($i = 0; $i < 84; $i++) {
            Post::create([
                'title' => $this->getFaker()->sentence(8, true),
                'user_id' => $users[$i % sizeof($users)]->id,
                'content' => $this->getFaker()->realText(200, 2),
                'voyage_id' => $voyages[$i]->id
            ]);
        }
    }
}