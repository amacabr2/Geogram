<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller {

    /**
     * Page d'accueil
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('welcome');
    }

    public function contact(ContactRequest $request) {
        Mail::to('webmaster@geogram.com')->queue(new ContactMail($request->except('_token')));

        return redirect()->route('welcome')->with('success', 'Votre mail a été envoyé, on vous répondra le plus vite possible');
    }
}
