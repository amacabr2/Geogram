<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $fillable = ['title', 'content', 'voyage_id', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function voyage() {
        return $this->belongsTo('App\Voyage');
    }
}
