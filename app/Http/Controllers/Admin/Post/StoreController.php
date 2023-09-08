<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::put('/images', $data['preview_image']);
        }
        if (isset($data['detail_image'])) {
            $data['detail_image'] = Storage::put('/images', $data['detail_image']);
        }
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);
        $post = Post::firstOrCreate($data);
        $post->tags()->attach($tagIds);
        return redirect()->route('admin.post.index');
    }
}
