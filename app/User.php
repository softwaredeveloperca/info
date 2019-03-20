<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
/*
protected $appends = ['money', 'fans'];
	 public function getMoneyAttribute()
{
    return 1000; //or however you want to manipulate it
}


	 public function getFansAttribute()
{
    return 10000; //or however you want to manipulate it
}

	public function moviegame()
	{
		return $this->hasOne('App\MovieGame', 'id',  'movie_game_id');
	}
*/	
}
