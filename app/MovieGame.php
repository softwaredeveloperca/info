<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;


class MovieGame extends Model
{
    protected $table = 'moviegame';
    protected $primaryKey = 'id';
	  protected $guarded = array('id');
	
	 protected $appends = ['day_rate'];
	 public function getDayRateAttribute()
{
    return 1000; //or however you want to manipulate it
}
	
	 public function getClosure($param) 
		{
    	return function ($query) use ($param) {
  	      $query->where('column', $param);
  	  };
		}
	
	public function playerList()
	{
		 return $this->hasMany('App\User', "movie_game_id");
	}
	
	public function schedule()
	{
		 return $this->hasMany('App\MovieGameSchedule', "game_id");
	}
	
}
