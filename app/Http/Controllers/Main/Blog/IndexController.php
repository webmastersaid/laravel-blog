<?php

namespace App\Http\Controllers\Main\Blog;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('main.blog.index');
    }
}
