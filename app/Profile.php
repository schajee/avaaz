<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gender', 'birthday', 'relationship', 'location', 'city', 'country', 'education', 'occupation', 'industry'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User', 'id');
    }
}
