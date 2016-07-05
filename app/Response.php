<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function option()
    {
        return $this->belongsTo('App\Option', 'option_id');
    }
    public function poll()
    {
        return $this->belongsTo('App\Poll', 'poll_id');
    }
}
