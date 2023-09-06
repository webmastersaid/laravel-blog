@extends('admin.layouts.admin')
@section('content')
    <div class="container scroll-y">
        <div class="row">
            <h1>Categories</h1>
        </div>
        <div class="row">
            <form action="{{ route('admin.category.store') }}" method="post">
                @csrf
                <input type="text" name="title" placeholder="Title" required><br>
                <br>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
