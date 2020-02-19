<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LandingControllerTest extends TestCase
{
    public function testLandingPage()
    {
        // @TODO create actual controller tests not just checking a 200
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
