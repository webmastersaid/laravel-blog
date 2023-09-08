<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'string',
            'title' => 'string',
            'preview_image' => 'file',
            'detail_image' => 'file',
            'category_id' => 'integer|exists:categories,id',
            'tag_ids' => 'array',
            'tags_ids.*' => 'integer|exists:post_tags,id'
        ];
    }
}
