<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieGameSchedule extends Model
{
       public $guarded=[];


  public function movie()
	{
		 return $this->hasMany('App\MovieGameMovies', "id", "movie_id");
	}
	
}
