<?php

namespace App\Http\Controllers;

use App\Abonne;
use App\Abonnement;
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
        $isAbonne = $this->isAbonne($id);

        return view('profil.profil', compact("user", "abonnements", "abonnes", "articles", "voyages", "friends", "isAbonne"));
    }

    /**
     * Afficher les abonnements avec un système de pagination avec de l'ajax
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function abonnements(int $id, Request $request) {
        $friends = $this->getAllAbonnementsOfUser($id)->paginate(9);

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
        $friends = $this->getAllAbonnesOfUser($id)->paginate(9);

        if ($request->ajax()) {
            return view('profil.includes.friends', compact("friends"));
        }

        return redirect()->route('profil', ['id' => $id]);
    }

    /**
     * Permet de s'abonner à une personne
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addAbonnement(int $id) {
        $abonnement = new Abonnement();
        $abonnement->user1_id = Auth::id();
        $abonnement->user2_id = $id;
        $abonnement->save();

        $abonne = new Abonne();
        $abonne->user1_id = $id;
        $abonne->user2_id = Auth::id();
        $abonne->save();

        return redirect()->route('profil', ['id' => $id])->with('success', 'Vous êtes maitenant abonnez à cette personne.');
    }

    /**
     * Permet de se désabonner
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAbonnement(int $id) {
        Abonnement::where('user1_id', Auth::id())
            ->where('user2_id', $id)
            ->delete();

        Abonne::where('user1_id',$id)
            ->where('user2_id',  Auth::id())
            ->delete();

        return redirect()->route('profil', ['id' => $id])->with('success', 'Vous êtes maintenant désabonné de cette personne.');
    }

    /**
     * @param int $id
     * @return array
     */
    private function getInfo(int $id): array {
        $abonnements = $this->getAllAbonnementsOfUser($id)->get();
        $abonnes = $this->getAllAbonnesOfUser($id)->get();
        $articles = $this->getAllActiclesOfUser($id)->get();
        $voyages = $this->getAllVoyagesOfArticles($id)->get();
        $user = User::findOrFail($id);
        return array($abonnements, $abonnes, $articles, $voyages, $user);
    }

    /**
     * Récupère les abonnements
     *
     * @param int $id
     * @return mixed
     */
    private function getAllAbonnementsOfUser(int $id) {
        return User::join('abonnements', 'abonnements.user2_id', '=', 'users.id')
            ->where('abonnements.user1_id', '=', $id);
    }

    /**
     * Récupère les abonnés
     *
     * @param int $id
     * @return mixed
     */
    private function getAllAbonnesOfUser(int $id) {
        return User::join('abonnes', 'abonnes.user2_id', '=', 'users.id')
            ->where('abonnes.user1_id', '=', $id);
    }

    /**
     * Récupère les articles
     *
     * @param int $id
     * @return mixed
     */
    private function getAllActiclesOfUser(int $id) {
        return Post::join('users', 'users.id', '=', 'posts.user_id')
            ->where('users.id', '=', $id);
    }

    /**
     * Récupère les voyages
     *
     * @param int $id
     * @return mixed
     */
    private function getAllVoyagesOfArticles(int $id) {
        return Voyage::where('voyages.user_id', '=', $id);
    }

    /**
     * Permet de savoir si la personne est abonné ou non à l'tuilisateur courant
     *
     * @param int $id
     * @return bool
     */
    private function isAbonne(int $id): bool {
        $user = User::join('abonnements', 'abonnements.user2_id', '=', 'users.id')
            ->where('abonnements.user2_id', '=', $id)
            ->where('abonnements.user1_id', '=', Auth::user()->id)
            ->get()
            ->toArray();

        return !empty($user);
    }
}
