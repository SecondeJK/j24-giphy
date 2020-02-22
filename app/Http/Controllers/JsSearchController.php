<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsSearchController extends Controller
{
    public function show(Request $request)
    {
        return view('jssearch');
    }
}
