<?php

namespace App\Http\Controllers\Main\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::paginate(10);
        return view('main.category.index', compact('categories'));
    }
}
