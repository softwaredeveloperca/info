<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Site;

class SiteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAllActiveSites()
    {
        $BaseSite=new Site;
        $Sites=$BaseSite->activeSites();
        $this->assertCount(116, $Sites);
    }
}
