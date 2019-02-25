<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteCategories extends Model
{
    protected $table = 'Sites';
    protected $primaryKey = 'SiteCategoryID';

    public function site()
    {
        return $this->hasMany('App\Site', 'SiteID', 'SiteID');
    }
    public function category()
    {
        return $this->hasMany('App\Category', 'CategoryID', 'CategoryID');
    }
}
