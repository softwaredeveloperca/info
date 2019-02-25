<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Path;
use App\Category;
use App\Stats;
use App\Jobs\ProcessStats;
use App\Jobs\ProcessContent;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->Site=new Site();
        $this->Path=new Path();
        $this->Category=new Category();
        $this->Stats=new Stats();
    }
    public function index()
    {

        $returnArray['ActiveSites']=$this->Site->activeSites();

        $this->Path->add("Sites", "", false);
        $returnArray['paths']=$this->Path->getAll();
        return view('sites.index', $returnArray);
    }

    public function site($PageName)
    {
       //ProcessStats::dispatch();
        //ProcessContent::dispatch();
       $returnArray['SiteInfo']=$this->Site
                                        ->where('PageName', $PageName)
                                        ->where('Active', 1)
                                        ->with('dbs')
                                        ->with('category')
                                        ->with('stats')
                                        ->firstOrFail();

       // dd($returnarray);

        $this->Path->add("Sites", "/sites", false);
        $this->Path->add($returnArray['SiteInfo']->Name, '', true);
        $returnArray['paths']=$this->Path->getAll();

        return view('sites.site', $returnArray);
    }

    public function categories()
    {
        $returnArray['Categories']=$this->Category->get();
      //  $this->Path->add("Categories", "", true);
      //  $returnArray['paths']=$this->Path->getAll();

        return view('sites.categories', $returnArray);
    }

    public function category($PageName)
    {
        $returnArray['Category']=$this->Category
                                       ->where('PageName', $PageName)
                                        ->with('Site')
                                        ->firstorFail();


       // $this->Path->add("Categories", "/categories", false);
       // $this->Path->add($returnArray['SiteCategoryInfo']->Name, '', true);
       // $returnArray['paths']=$this->Path->getAll();

        return view('sites.category', $returnArray);
    }

}
