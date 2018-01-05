<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::join('users', 'users.id', '=', 'posts.user_id')
            ->join('abonnements', 'abonnements.user2_id', '=', 'users.id')
            ->join('voyages', 'voyages.id', '=', 'posts.voyage_id')
            ->select('*')
            ->where('abonnements.user1_id', '=', Auth::user()->id)
            ->paginate(10);
        return view('home', compact('posts'));
    }
}
