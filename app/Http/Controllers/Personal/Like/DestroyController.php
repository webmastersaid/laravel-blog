<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->likedPosts;
        return redirect()->route('personal.like.index');
    }
}
