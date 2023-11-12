<?php

namespace App\Http\Controllers\Main\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts = $category->posts()->paginate(10);
        $categoryName = $category->title;
        return view('main.category.post.index', compact('posts', 'categoryName'));
    }
}
