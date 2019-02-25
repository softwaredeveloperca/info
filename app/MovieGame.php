<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;


class MovieGame extends Model
{
    protected $table = 'moviegame';
    protected $primaryKey = 'id';
	protected $guarded = array('id');
	
}
