@extends('admin.layouts.main')
@section('content')
<div class="container scroll-y">
    @include('admin.dashboard.includes.header')
    <div class="container">
        <div class="row">
            <div class="card bg-info-subtle col-2 m-1">
                <div class="card-body">
                    <div class="card-title fs-1">{{$data['usersCount']}}</div>
                    <div class="card-subtitle mb-2 text-body-secondary fs-2">Users</div>
                    <a href="{{route('admin.user.index')}}" class="card-link">View</a>
                </div>
            </div>
            <div class="card bg-success-subtle col-2 m-1">
                <div class="card-body">
                    <div class="card-title fs-1">{{$data['postsCount']}}</div>
                    <div class="card-subtitle mb-2 text-body-secondary fs-2">Posts</div>
                    <a href="{{route('admin.post.index')}}" class="card-link">View</a>
                </div>
            </div>
            <div class="card bg-warning-subtle col-3 m-1">
                <div class="card-body">
                    <div class="card-title fs-1">{{$data['categoriesCount']}}</div>
                    <div class="card-subtitle mb-2 text-body-secondary fs-2">Categories</div>
                    <a href="{{route('admin.category.index')}}" class="card-link">View</a>
                </div>
            </div>
            <div class="card bg-danger-subtle col-2 m-1">
                <div class="card-body">
                    <div class="card-title fs-1">{{$data['tagsCount']}}</div>
                    <div class="card-subtitle mb-2 text-body-secondary fs-2">Tags</div>
                    <a href="{{route('admin.tag.index')}}" class="card-link">View</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection