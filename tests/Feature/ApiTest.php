<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\GiphyApi;

class ApiTest extends TestCase
{
    public function testApiCreation()
    {
        // create the API
        //@TODO move creation to set up then destory in breakdown
        $api = new GiphyApi();

        //@TODO this can stay in this test
        $this->assertInstanceOf(GiphyApi::class, $api);
    }

    public function testApiGet()
    {
        $api = new GiphyApi();

        // make a call to the API
        $response = $api->get('/something');

        // test we got a payload back, mock this out
        $this->assertIsArray($response);
    }

    public function testLimit()
    {
        $api = new GiphyApi();
        $limit1 = rand(0,20);
        $limit2 = rand(0,20);

        $response1 = $api->getMostRecentGifs($limit1);
        $response2 = $api->getMostRecentGifs($limit2);
        $this->assertCount($limit1, $response1);
        $this->assertCount($limit2, $response2);
    }
}
