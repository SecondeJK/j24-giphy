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
        $api = new GiphyApi();
        $this->assertInstanceOf(GiphyApi::class);
        // make a call to the API
        $response = $api->get('/something');

        // test we got a payload back
        $this->assertJson($response);
    }
}
