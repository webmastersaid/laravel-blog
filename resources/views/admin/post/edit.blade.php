@extends('admin.layouts.main')
@section('content')
<div class="container scroll-y">
    @include('admin.post.includes.header')
    <div class="row">
        <form action="{{ route('admin.post.update', $post->id) }}" method="post">
            @csrf
            @method('patch')
            <input type="text" name="title" placeholder="Title" value="{{ $post->title }}" required><br>
            <br>
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{route('admin.post.index')}}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection