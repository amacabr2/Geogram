<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voyage extends Model {

    protected $fillable = [ 'state', 'longitude', 'latitude', 'dateDebut', 'dateFin' ];

    public function posts() {
        return $this->hasMany('App\Post');
    }
}
