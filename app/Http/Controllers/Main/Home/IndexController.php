<?php

namespace App\Http\Controllers\Main\Home;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $headerPosts = Post::orderBy('created_at', 'DESC')->get()->take(1);
        $randomPosts = Post::orderBy('created_at', 'DESC')->where('id', '!=', $headerPosts[0]->id)->get()->take(2);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get();
        return view('main.home.index', compact('headerPosts', 'randomPosts', 'likedPosts'));
    }
}
