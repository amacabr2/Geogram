<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model {

    protected $fillable = ['content', 'user_id', 'post_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function post() {
        return $this->belongsTo('App\Post');
    }
}
