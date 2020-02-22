<?php

namespace App\Http\Controllers;

use App\Media;
use App\Services\GiphyApi;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Cache;

class SearchController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request) : View
    {
        $api = new GiphyApi();
        $searchTerm = $request->query('search');
        // if no search term lets just give back most recent
        if (!$searchTerm) {
            $payload = $api->getMostRecentGifs();
        } else {
            $payload = Cache::remember('search_results', 1, function() use ($api, $searchTerm) {
                return $api->getSearch($searchTerm);
            });
        }


        return view('search', ['apiData' => $payload]);
    }
}
