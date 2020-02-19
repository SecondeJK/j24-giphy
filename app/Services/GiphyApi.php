<?php

namespace App\Services;

use http\Client\Response;

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
     * @return Response
     */
    public function get(string $path) : Response
    {
        // @TODO WIP
       return new Response();
    }
}
