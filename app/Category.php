<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Categories';
    protected $primaryKey = 'CategoryID';

    public function site()
    {
        return $this->belongstoMany('App\Site', 'SiteCategories', 'CategoryID', 'SiteID',  'CategoryID', 'SiteID');
    }
}
