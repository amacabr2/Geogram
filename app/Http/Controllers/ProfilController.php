<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller {

    /**
     * Montre le profil de l'utilisateur via l'id
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id) {
        return view('profil.profil', compact("id"));
    }
}
