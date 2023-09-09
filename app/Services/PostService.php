<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['detail_image'])) {
                $data['detail_image'] = Storage::disk('public')->put('/images', $data['detail_image']);
            }
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            $post = Post::firstOrCreate($data);
            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500);
        }
    }
    public function update($data, $post)
    {
        try {
            DB::beginTransaction();
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['detail_image'])) {
                $data['detail_image'] = Storage::disk('public')->put('/images', $data['detail_image']);
            }
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            $post->update($data);
            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500);
        }
        return $post;
    }
}
