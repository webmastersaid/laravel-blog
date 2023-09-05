<?php

namespace App\Http\Controllers\Main\Home;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('main.home.index');
    }
}
