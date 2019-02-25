<?php

namespace App;



use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'Links';
    protected $primaryKey = 'LinkID';

    public function ContentStat()
    {
        return $this->hasMany('App\ContentStat', "LinkID", "LinkID");
    }

    public function Dbs()
    {
        return $this->hasOne('App\Dbs', "DBID", "DBID");
    }

}
