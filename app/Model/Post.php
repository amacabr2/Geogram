<?php

namespace App;

use App\Concerns\AttachableConcern;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    use AttachableConcern;

    protected $fillable = ['title', 'content', 'voyage_id', 'user_id'];

    public static function draft() {
        return self::firstOrCreate([
            'title' => null,
            'user_id' => null,
            'content' => '',
            'voyage_id' => null,
        ]);
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function voyage() {
        return $this->belongsTo('App\Voyage');
    }

    public function scopeNotDraft($query) {
        return $query->whereNotNull('title');
    }
}
