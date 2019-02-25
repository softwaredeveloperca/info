<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
	protected $table = 'Sites';
    protected $primaryKey = 'SiteID';

    public function activeSites()
    {
        return $this->where('Active', 1)->get();
    }

    public function getRouteKeyName() {
        return 'PageName';
    }

    public function dbs()
    {
        return $this->hasMany('App\Dbs', 'SiteID', 'SiteID');
    }

    public function stats($Limit=100)
    {
        return $this->hasMany('App\Stats', 'SiteID', 'SiteID')->orderBy("Total", "DESC")->take(20);
    }

    public function category()
    {
        return $this->belongsToMany('App\Category', 'SiteCategories', 'SiteID', 'CategoryID', 'SiteID', 'CategoryID');
    }
}
