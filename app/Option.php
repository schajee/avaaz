<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public function poll()
    {
        return $this->belongsTo('App\Poll', 'poll_id');
    }

    public function type()
    {
        return $this->belongsTo('App\OptionType', 'option_type');
    }
}
