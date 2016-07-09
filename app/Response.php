<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'poll_id', 'option_id',
    ];

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
