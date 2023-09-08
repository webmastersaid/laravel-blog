<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        try{
            $data = $request->validated();
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['detail_image'])) {
                $data['detail_image'] = Storage::disk('public')->put('/images', $data['detail_image']);
            }
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            $post->update($data);
            $post->tags()->attach($tagIds);
        }catch(\Exception $e){
            abort(404);
        }
        return redirect()->route('admin.post.show', $post);
    }
}
