<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    CONST ITEMS_PER_PAGE = 10;
    
	// status: pending, approved, Kicked
    protected $fillable = [
    	'name', 'avatar', 'slogan', 'home_stadium_id', 'leader', 'status'
    ];

    public function user()
    {
    	return $this->hasOne('App\User', 'leader', 'id');
    }

    public function images()
    {
    	return $this->morphMany('App\Image', 'imageable');
    }
}
