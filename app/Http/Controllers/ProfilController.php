<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Voyage;
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
        $friends = null;
        list($abonnements, $abonnes, $articles, $voyages, $user) = $this->getInfo($id);

        return view('profil.profil', compact("user", "abonnements", "abonnes", "articles", "voyages", "friends"));
    }

    /**
     * Afficher les abonnements avec un système de pagination avec de l'ajax
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function abonnements(int $id, Request $request) {
        $friends = $this->getAllAbonnementsOfUser()->paginate(9);

        if ($request->ajax()) {
            return view('profil.includes.friends', compact("friends"));
        }

        return redirect()->route('profil', ['id' => $id]);
    }

    /**
     * Afficher les abonnés avec un système de pagination avec de l'ajax
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function abonnes(int $id, Request $request) {
        $friends = $this->getAllAbonnesOfUser()->paginate(9);

        if ($request->ajax()) {
            return view('profil.includes.friends', compact("friends"));
        }

        return redirect()->route('profil', ['id' => $id]);
    }

    /**
     * @param int $id
     * @return array
     */
    private function getInfo(int $id): array {
        $abonnements = $this->getAllAbonnementsOfUser()->get();
        $abonnes = $this->getAllAbonnesOfUser()->get();
        $articles = $this->getAllActiclesOfUser()->get();
        $voyages = $this->getAllVoyagesOfArticles()->get();
        $user = User::findOrFail($id);
        return array($abonnements, $abonnes, $articles, $voyages, $user);
    }

    /**
     * Récupère les abonnements
     *
     * @return mixed
     */
    private function getAllAbonnementsOfUser() {
        return User::join('abonnements', 'abonnements.user2_id', '=', 'users.id')
            ->where('abonnements.user1_id', '=', Auth::user()->id);
    }

    /**
     * Récupère les abonnés
     *
     * @return mixed
     */
    private function getAllAbonnesOfUser() {
        return User::join('abonnes', 'abonnes.user2_id', '=', 'users.id')
            ->where('abonnes.user1_id', '=', Auth::user()->id);
    }

    /**
     * Récupère les articles
     *
     * @return mixed
     */
    private function getAllActiclesOfUser() {
        return Post::join('users', 'users.id', '=', 'posts.user_id')
            ->where('users.id', '=', Auth::user()->id);
    }

    /**
     * Récupère les voyages
     *
     * @return mixed
     */
    private function getAllVoyagesOfArticles() {
        return Voyage::where('voyages.user_id', '=', Auth::user()->id);
    }
}
