<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Site;

class SiteTest extends TestCase
{
    /** @sites */
    public function testSiteTest()
    {
        $response = $this->get('/sites');

        $response->assertSee('Magic');

        $response->assertStatus(200);
    }


    public function testSitePageTest()
    {
        $BaseSite=new Site;
        $SiteName=$BaseSite->activeSites()->last();

        $response = $this->get('/site/' . strtolower($SiteName->PageName));

        $response->assertSee($SiteName->Name);

        $response->assertStatus(200);
    }

}
