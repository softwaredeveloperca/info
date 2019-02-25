<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentStat extends Model
{
    protected $table = 'ContentStats2';
    protected $primaryKey = 'ContactStatID';

    public function Site()
    {
        return $this->belongsTo('App\Site', 'SiteID', 'SiteID');
    }

    public function Link()
    {
        return $this->hasOne('App\Link', "LinkID", "LinkID");
    }

    public function calculateBySite($SiteID)
    {
        return 1;
        $stats=$this->link()->where('SiteID', $SiteID)->get();
        return count($stats);

    }
}
