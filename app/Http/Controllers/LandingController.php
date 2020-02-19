<?php

namespace App\Http\Controllers;

use App\Services\GiphyApi;
use Illuminate\Http\Request;
use Cache;
use Illuminate\View\View;

class LandingController extends Controller
{
    // first task: hit an endpoint and retrieve most popular gify with cache of 1hr
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show() : View
    {
        $api = new GiphyApi();

        $apiData = Cache::remember('most_recent', 60, function() use ($api) {
            return $api->getMostRecentGifs();
        });

        $templatePayload = ['apiData' => $apiData];

        return view('landing', $templatePayload);
    }
}
