<?php

namespace App\Http\Controllers;

use App\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentairesController extends Controller {

    public function store(Request $request, int $id) {
        $this->validate($request, [
            'contenu' => 'required'
        ]);
        $data = [
            'content' => $request->contenu,
            'post_id' => $id,
            'user_id' => Auth::user()->id
        ];
        Commentaire::create($data);
        return redirect(route('post.show', $id));
    }

    public function delete(int $id, int $post) {
        $commentaire = Commentaire::findOrFail($id);
        $commentaire->delete();
        return redirect(route('post.show', $post));
    }

    public function update(int $id, int $post, Request $request) {
        $commentaire = Commentaire::findOrFail($id);
        $this->validate($request, [
            'contenu' => 'required'
        ]);
        $data = [
            'content' => $request->contenu,
            'post_id' => $post,
            'user_id' => Auth::user()->id
        ];
        $commentaire->update($data);
        return redirect(route('post.show', $post));
    }
}
