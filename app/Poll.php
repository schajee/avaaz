<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    public function topics()
    {
        return $this->belongsToMany('App\Topic');
    }

    public function options()
    {
        return $this->hasMany('App\Option');
    }

    public function responses()
    {
        return $this->hasMany('App\Response');
    }
}
