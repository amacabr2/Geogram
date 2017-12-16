<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('abonnements', 'abonnements.user2_id', '=', 'users.id')
            ->join('voyages', 'voyages.id', '=', 'posts.voyage_id')
            ->select('*')
            ->where('abonnements.user1_id', '=', Auth::user()->id)
            ->get();
        //dd($posts);
        return view('home', compact('posts'));
    }
}
