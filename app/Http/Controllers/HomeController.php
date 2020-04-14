<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseApiController;
use DiDom\Document;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends BaseApiController
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $history = 'history';
        return view('home', compact('history'));
    }
}
