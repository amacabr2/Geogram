<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\User;
use App\Utils\UploadImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {

    use UploadImageHelper;

    /**
     * Affiche les utilsateurs auquel l'utilisateur courant n'est pas abonné
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search() {
        $users = User::select('users.id', 'users.pseudo', 'users.job', 'users.description',  'users.avatar', 'users.couverture', 'users.sexe')
            ->join('abonnements', 'abonnements.user2_id', '=', 'users.id')
            ->where('users.id', '!=', Auth::id())
            ->whereNOTIn('abonnements.user2_id', function ($query) {
                $query->select('users.id')
                    ->from('users')
                    ->join('abonnements', 'abonnements.user2_id', '=', 'users.id')
                    ->where('abonnements.user1_id', '=', Auth::id());
            })
            ->groupBy('users.id')
            ->orderBy('users.id')
            ->paginate(12);

        return view('user.search', compact("users"));
    }

    /**
     * L'utilisateur modifie ses informations
     *
     * @param UserUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request) {
        /** @var User $user */
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
        $user->job = $request->input('job');
        $user->lienFacebook = $request->input('lienFacebook');
        $user->lienInstagram = $request->input('lienInstagram');
        $user->lienTwitter = $request->input('lienTwitter');
        $user->lienGoogle = $request->input('lienGoogle');
        $user->save();

        if (!empty($request->file('avatar'))) {
            $this->uploadFile($request->file('avatar'), 'avatar', $user, true);
        }
        if (!empty($request->file('couverture'))) {
            $this->uploadFile($request->file('couverture'), 'couverture', $user, true);
        }

        return redirect()->route('profil', ['id' => Auth::id()])->with('success', 'Vos informations ont été modifiées avec succès, pour les images attendez un peu puis rafraichissez la page.');
    }
}
