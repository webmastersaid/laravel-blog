@extends('main.layouts.main')
@section('content')
<div class="container pt-5">
    <div class="text-center">
        <h1>Categories</h1>
    </div>
    <div class="pt-5">
        @foreach ($categories as $category)
            <a href="{{route('main.category.post.index', $category->id)}}" class="btn btn-secondary">
                <h5 class="card-title">{{$category->title}}</h5>
            </a>
        @endforeach
    </div>
</div>
@endsection