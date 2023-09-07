@extends('admin.layouts.main')
@section('content')
    <div class="container scroll-y">
        <div class="row">
            <h1>Categories</h1>
        </div>
        <div class="row">
            <form action="{{ route('admin.category.update', $category->id) }}" method="post">
                @csrf
                @method('patch')
                <input type="text" name="title" placeholder="Title" value="{{ $category->title }}" required><br>
                <br>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('admin.category.index')}}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
