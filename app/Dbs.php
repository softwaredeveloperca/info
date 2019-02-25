<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dbs extends Model
{
    protected $table = 'DBs';

    protected $primaryKey = 'DBID';

    public function Site()
    {
        return $this->belongsTo('App\Site', 'SiteID', 'SiteID');
    }

    public function Link()
    {
        return $this->hasMany('App\Link', 'DBID', 'DBID');
    }
}
