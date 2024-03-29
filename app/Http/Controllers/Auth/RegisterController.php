<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Utils\UploadImageHelper;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {

    use UploadImageHelper;

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'pseudo' => 'required|string|max:255',
            'lastName' => 'required',
            'firstName' => 'required',
            'sexe' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'state' => 'required',
            'codePostal' => 'required|integer',
            'adresse' => 'required',
            'birthDate' => 'required|date',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg',
            'couverture' => 'nullable|image|mimes:jpeg,png,jpg',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data) {
        /** @var User $user */
        $user =  User::create([
            'pseudo' => $data['pseudo'],
            'lastName' => $data['lastName'],
            'firstName' => $data['firstName'],
            'sexe' => $data['sexe'],
            'state' => $data['state'],
            'codePostal' => $data['codePostal'],
            'adresse' => $data['adresse'],
            'birthDate' => $data['birthDate'],
            'description' => $data['description'],
            'avatar' => null,
            'couverture' => null,
            'job' => $data['job'],
            'lienFacebook' => $data['lienFacebook'],
            'lienInstagram' => $data['lienInstagram'],
            'lienTwitter' => $data['lienTwitter'],
            'lienGoogle' => $data['lienGoogle'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        if (!empty($data['avatar'])) {
            $this->uploadFile($data['avatar'], 'avatar', $user);
        }
        if (!empty($data['couverture'])) {
            $this->uploadFile($data['couverture'], 'couverture', $user);
        }

        return $user;
    }


}
