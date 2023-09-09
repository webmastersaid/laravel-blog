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
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'preview_image' => 'nullable|file',
            'detail_image' => 'nullable|file',
            'category_id' => 'nullable|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tags_ids.*' => 'nullable|integer|exists:post_tags,id'
        ];
    }
    public function messages()
    {
        return [
            'title.string' => 'String type',
            'content.string' => 'String type',
            'preview_image.file' => 'File type',
            'detail_image.file' => 'File type',
            'category_id.integer' => 'Integer type',
            'tag_ids.array' => 'Array type',
            'tags_ids.*.integer' => 'Integer type'
        ];
    }
}
