<?php

use App\Commentaire;
use App\Post;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: antho
 * Date: 17/12/2017
 * Time: 13:56
 */

class CommentairesTableSeeder extends Seeder {

    use HelperSeeder;

    /**
     * Créer un certain nombre de commentaires en base de données
     */
    public function run() {
        DB::table('commentaires')->delete();

        $users = User::all();
        $posts = Post::all();

        for ($i = 0; $i < 200; $i++) {
            Commentaire::create([
               'content' => $this->getFaker()->realText(50, 2),
               'user_id' => $users[$i % sizeof($users)]->id,
               'post_id' => $posts[$i % sizeof($posts)]->id
            ]);
        }
    }
}