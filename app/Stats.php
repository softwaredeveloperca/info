<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Stats extends Model
{
    public $guarded=[];
    public function Site()
    {
        return $this->belongsTo('App\Site', 'SiteID', 'SiteID');
    }

    public function generateContentStats()
    {

        Stats::truncate();
        $Stats=DB::select("select
                              Sites.SiteID as SiteID,
                              TheCount, DBs.DBID,
                              DBs.DB as TheDB,
                              DBs.Name as TheName,
                              PrimaryField,
                              ContentField,
                              ItemPageName,
                              concat(URL, '/', BaseDirectory, '/', ItemPageName, '.html') as TheURL
                            FROM
                            (
                                select count(*) as TheCount, DBID, ItemPageName
                                from
                                ContentStats2 as ContentStats, Links
                                where
                                Links.LinkID=ContentStats.LinkID
                                group by  DBID, ItemPageName
                                order by DBID, count(*) desc
                            ) stats, DBs, Sites
                            where stats.DBID=DBs.DBID and DBs.SiteID=Sites.SiteID
                            and DBs.Active=1 AND Sites.Active=1");

        foreach($Stats as $Stat)
        {


            $Content=$this->getContent(
                                        $Stat->PrimaryField,
                                        $Stat->ContentField,
                                        $Stat->SiteID,
                                        $Stat->TheDB,
                                        $Stat->TheName,
                                        $Stat->ItemPageName
                                      );
            $this->insert([
                'Title' => $Content['Title'],
                'Content' => $Content['Body'],
                'URL' => $Stat->TheURL,
                'SiteID' => $Stat->SiteID,
                'Total' => $Stat->TheCount,
                'created_at' => Carbon::now()
            ]);
        }

        return true;
    }

    protected function getContent($PrimaryField, $ContentField, $SiteID, $TheDB, $TheName, $ItemPageName)
    {
        $Content=DB::select(DB::raw("select " . $PrimaryField . " as TheTitle, " . $ContentField . " as TheContent FROM clf55_" . $TheDB . "." . $TheName . " where PageName = '" . $ItemPageName . "' LIMIT 1"));
        $Data['Title']=isset($Content[0]->TheTitle) ? $Content[0]->TheTitle: ' ';
        $Data['Body']=isset($Content[0]->TheContent) ? substr(iconv("UTF-8", "utf-8//TRANSLIT", strip_tags(trim($Content[0]->TheContent))), 0, 255) : ' ';
        return $Data;
    }


}
