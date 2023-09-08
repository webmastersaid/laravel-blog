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
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.post.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
