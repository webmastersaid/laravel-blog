@extends('admin.layouts.main')
@section('content')
    <div class="container scroll-y">
        @include('admin.post.includes.header')
        <div class="row">
            <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="titleFormControlInput" class="form-label">Title</label>
                    <input type="text" class="form-control" id="titleFormControlInput" name="title"
                        placeholder="Some post title" value="{{ old('title') }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="contentFormControlTextarea" class="form-label">Content</label>
                    <textarea class="form-control" id="contentFormControlTextarea" rows="3" name="content"
                        placeholder="Some post contetn">
                        {{ old('content') }}
                    </textarea>
                    @error('content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="previewImage" class="form-label">Preview image</label>
                    <input class="form-control" type="file" id="previewImage" name="preview_image">
                </div>
                <div class="mb-3">
                    <label for="detailImage" class="form-label">Detail image</label>
                    <input class="form-control" type="file" id="detailImage" name="detail_image">
                </div>
                <div class="mb-3">
                    <label for="categorySelect" class="form-label">Select category</label>
                    <select id="categorySelect" class="form-select" name="category_id" aria-label="Category select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == old('category_id') ? ' selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tagMultipleSelect" class="form-label">Select category</label>
                    <select id="tagMultipleSelect" class="form-select" name="tag_ids[]" multiple
                        aria-label="Multiple select tags">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                                {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : '' }}>
                                {{ $tag->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.post.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
