<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pseudo', 'lastName', 'firstName', 'sexe', 'email', 'password', 'state', 'codePostal', 'adresse', 'birthDate', 'description',
        'avatar', 'couverture', 'job', 'lienFacebook', 'lienInstagram', 'lienTwitter', 'lienGoogle'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function abonnes() {
        //return $this->belongsToMany('App\Abonne');
        return $this->hasMany('App\Abonne');
    }

    public function abonnements() {
        //return $this->belongsToMany('App\Abonnement');
        return $this->hasMany('App\Abonnement');
    }

    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function commentaires() {
        return $this->hasMany('App\Commentaire');
    }

    public function voyages() {
        return$this->hasMany('App\Voyage');
    }
}
