<?php

namespace App\Http\Controllers;

use App\Commentaire;
use App\Post;
use App\Voyage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller {

    public function show(int $id) {
        $post = Post::findOrFail($id); // Post::notDraft()->get()
        $commentaires = $this->getCommenataireOfPost($id);
        return view('post.voirPost', compact('post', 'commentaires'));
    }

    public function create() {
        $edit = false;
        $post = Post::draft();
        $voyages = Voyage::where('voyages.user_id', '=', Auth::user()->id)->pluck('state', 'id');
        return view('post.createPost', compact('post', 'voyages', 'edit'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'contenu' => 'required',
            'voyage_id' => 'required'
        ]);
        $data = [
            'title' => $request->title,
            'content' => $request->contenu,
            'voyage_id' => $request->voyage_id,
            'user_id' => Auth::user()->id
        ];
        Post::create($data);
        return redirect(route('profil', Auth::user()->id))->withSuccess('L\'article à été créé');
    }

    public function edit(int $id) {
        $edit = true;
        $post = Post::findOrFail($id);
        $voyages = Voyage::pluck('state', 'id');
        return view('post.editPost', compact('post', 'voyages', 'edit'));
    }

    public function update(int $id, Request $request) {
        $post = Post::findOrFail($id);
        $this->validate($request, [
            'title' => 'required',
            'contenu' => 'required',
            'voyage_id' => 'required'
        ]);
        $data = [
            'title' => $request->title,
            'content' => $request->contenu,
            'voyage_id' => $request->voyage_id,
            'user_id' => Auth::user()->id
        ];
        $post->update($data);
        return redirect(route('profil', Auth::user()->id))->withSuccess('L\'article à été modifié');
    }

    public function delete(int $id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect(route('profil', Auth::user()->id))->withSuccess('L\'article à été supprimé');
    }

    public function getCommenataireOfPost(int $id) {
        return Commentaire::where('commentaires.post_id', '=', $id);
    }
}
