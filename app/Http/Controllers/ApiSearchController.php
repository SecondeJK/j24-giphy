<?php

namespace App\Http\Controllers;

use App\Image;
use App\Media;
use Illuminate\Http\Request;

class ApiSearchController extends Controller
{
    public $responseUrls = [];

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchTerm = strtolower($request->query('term'));
        // this behaviour is different from the API controller because we're bringing back local data
        $media = Media::with('image')->where('title', 'LIKE', "%$searchTerm%")->get();
        // @TODO make use of Laravel's collections and some functional programming to map this and make it cleaner
        foreach ($media as $item) {
            // this first() code bit below is technically wrong because my data is wrong because I've been building it on the fly
            // in your case, everything will be nice and one to one relationship defined
            $imageData = $item->image()->get()->first()->image_data;
            $imageDataDecoded = json_decode($imageData, true);
            $this->responseUrls[] = $imageDataDecoded['fixed_height_downsampled']['url'];
        }

        return response($this->responseUrls, 200);
    }
}
