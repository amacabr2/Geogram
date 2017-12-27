<?php

namespace App\Http\Controllers;

use App\Voyage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoyagesController extends Controller {

    public function show(int $id) {
        $voyage = Voyage::findOrFail($id);
        return view('voyage.voirVoyage', compact('voyage'));
    }

    public function create() {
        $voyage = new Voyage();
        return view('voyage.createVoyage', compact('voyage'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'state' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'dateBegin' => 'required',
            'dateEnd' => 'required'
        ]);
        $data = [
            'state' => $request->state,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'dateBegin' => $request->dateBegin,
            'dateEnd' => $request->dateEnd,
            'user_id' => Auth::user()->id
        ];
        Voyage::create($data);
        return redirect(route('profil', Auth::user()->id))->withSuccess('Le voyage à été enregistré');
    }

    public function edit(int $id) {
        $voyage = Voyage::findOrFail($id);
        return view('voyage.editVoyage', compact('voyage'));
    }

    public function update(int $id, Request $request) {
        $voyage = Voyage::findOrFail($id);
        $this->validate($request, [
            'state' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'dateBegin' => 'required',
            'dateEnd' => 'required'
        ]);
        $data = [
            'state' => $request->state,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'dateBegin' => $request->dateBegin,
            'dateEnd' => $request->dateEnd,
            'user_id' => Auth::user()->id
        ];
        $voyage->update($data);
        return redirect(route('profil', Auth::user()->id))->withSuccess('Le voyage à été modifié');
    }
}
