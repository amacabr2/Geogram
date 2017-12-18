<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    /**
     * L'utilisateur modifie ses informations
     *
     * @param UserUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request) {
        $user = Auth::user();

        $user->pseudo = $request->input('pseudo');
        $user->lastName = $request->input('lastName');
        $user->firstName = $request->input('firstName');
        $user->email = $request->input('email');
        $user->state = $request->input('state');
        $user->codePostal = $request->input('codePostal');
        $user->adresse = $request->input('adresse');
        $user->birthDate = $request->input('birthDate');
        $user->description = $request->input('description');
        //$user->avatar = $request->input('avatar');
        //$user->couverture = $request->input('couverture');
        $user->job = $request->input('job');
        $user->lienFacebook = $request->input('lienFacebook');
        $user->lienInstagram = $request->input('lienInstagram');
        $user->lienTwitter = $request->input('lienTwitter');
        $user->lienGoogle = $request->input('lienGoogle');
        $user->save();

        return redirect()->route('profil', ['id' => Auth::id()])->with('success', 'Vos informations ont été modifiées avec succès');
    }
}
