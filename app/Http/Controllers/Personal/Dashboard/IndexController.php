<?php

namespace App\Http\Controllers\Personal\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['usersCount'] = User::count();
        $data['postsCount'] = Post::count();
        $data['categoriesCount'] = Category::count();
        $data['tagsCount'] = Tag::count();
        return view('personal.dashboard.index', compact('data'));
    }
}
