<?php

namespace App\Services;

use GuzzleHttp\Client;

class GiphyApi
{
    const GIPHY_API_KEY_URL_CODE = 'api_key';

    protected $basePath;
    protected $apiKey;

    /**
     * API Constructor
     * Grab some env variables and set me up please
     *
     */
    public function __construct()
    {
        $this->apiKey = env('GIPHY_API_KEY');
        $this->http = new Client(['base_uri' => env('GIPHY_API_BASE_PATH')]);
    }

    /**
     * @param string $path
     * @return array converted array from json response
     *
     * Protected because in an ideal world, hands of my inner workings please.
     */
    protected function get(string $path) : array
    {
        // @TODO there is obviously a far more graceful way of encoding this parameter into each call
        $response = $this->http->get($path . '&' . self::GIPHY_API_KEY_URL_CODE . '=' . $this->apiKey);

        // @TODO real nice exception handling, but is not in task requirements
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Fetches most recent gifs from trending endpoint
     *
     * @param int $limit
     * @return array
     */
    public function getMostRecentGifs(int $limit = 20) : array
    {
        return $this->get('gifs/trending?limit=' . $limit);
    }

    /**
     * @param string $term
     * @return array
     */
    public function getSearch(string $term) : array
    {
        return $this->get('gifs/search?q=' . urlencode($term));
    }

    public function getRandom() : array
    {
        return $this->get('gifs/random?');
    }
}
