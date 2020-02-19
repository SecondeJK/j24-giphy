<?php

namespace App\Services;

class GiphyApi
{
    protected $basePath;
    protected $apiKey;

    /**
     * API Constructor
     * Grab some env variables and set me up please
     *
     */
    public function __construct()
    {
        $this->basePath = env('GIPHY_API_BASE_PATH');
        $this->apiKey = env('GIPHY_API_KEY');
    }

    /**
     * @param string $path
     * @return array converted array from json response
     */
    public function get(string $path) : array
    {
        // @TODO WIP
       return [];
    }

    /**
     * Fetches most recent gifs from trending endpoint
     *
     * @return array
     */
    public function getMostRecentGifs($limit = 20) : array
    {
        $paramsString = "";
        return $this->get();
    }
}
