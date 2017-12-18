<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller {

    public function show(int $id) {
        return view('profil.profil', compact("id"));
    }
}
