<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\BeforeUpdate;

class User extends Authenticatable
{
    use Notifiable;
    use BeforeUpdate;

    CONST ITEMS_PER_PAGE = 10;
    CONST ADMIN = 1;
    CONST NORMAL = 0;
    CONST MALE = 1;
    CONST FEMALE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'address', 'gender', 'team_id', 'birthday'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function team()
    {
        return $this->belongsTo('App\Team', 'team_id', 'id');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
}
