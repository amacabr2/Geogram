<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model {

    public function user() {
        return $this->belongsTo('App\User');
    }

}
