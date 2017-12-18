<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller {

    /**
     * Montre le profil de l'utilisateur via l'id
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id) {
        $abonnements = $this->getAllAbonnementsOfUser();
        $abonnes = $this->getAllAbonnesOfUser();
        $articles = $this->getAllActiclesOfUser();
        return view('profil.profil', compact("id", "abonnements", "abonnes", "articles"));
    }

    public function getAllAbonnementsOfUser() {
        return User::join('abonnements', 'abonnements.user2_id', '=', 'users.id')
            ->where('abonnements.user1_id', '=', Auth::user()->id)->get();
    }

    public function getAllAbonnesOfUser() {
        return User::join('abonnes', 'abonnes.user2_id', '=', 'users.id')
            ->where('abonnes.user1_id', '=', Auth::user()->id)->get();
    }

    public function getAllActiclesOfUser() {
        return Post::join('users', 'users.id', '=', 'posts.user_id')
            ->where('users.id', '=', Auth::user()->id)->get();
    }
}
