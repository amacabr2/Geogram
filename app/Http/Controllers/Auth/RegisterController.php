<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;

class RegisterController extends Controller {

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
            'job' => $data['job'],
            'lienFacebook' => $data['lienFacebook'],
            'lienInstagram' => $data['lienInstagram'],
            'lienTwitter' => $data['lienTwitter'],
            'lienGoogle' => $data['lienGoogle'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->avatar = (!empty($data['avatar'])) ? $this->uploadFile($data['avatar'], 'avatar', $user)  : "avatar";
        $user->couverture =(!empty($data['couverture'])) ? $this->uploadFile($data['couverture'], 'couverture', $user)  : "couverture";
        $user->save();

        return $user;
    }

    /**
     * Upload l'avatar et la couverture
     *
     * @param UploadedFile $uploadedFile
     * @param string $typeImage
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    private function uploadFile(UploadedFile $uploadedFile, string $typeImage, User $user) {
        $file = $uploadedFile->move(public_path('uploads/' . $user->id ."/{$typeImage}"), $uploadedFile->getClientOriginalName());
        $formats = ($typeImage == 'avatar') ? [[150, 150], [500, 500]] : [[1000, 650], [2000, 1300]];
        $filename = pathinfo($file, PATHINFO_FILENAME);

        foreach ($formats as $format) {
            $manager = new ImageManager(['driver' => 'gd']);
            $manager->make($file->getRealPath())
                ->fit($format[0], $format[1])
                ->save(public_path( "uploads/" . $user->id ."/{$typeImage}") . "/{$filename}_{$format[0]}x{$format[1]}.png");
        }

        return $filename;
    }
}
