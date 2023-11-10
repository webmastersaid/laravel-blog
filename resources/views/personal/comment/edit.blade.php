@extends('personal.layouts.main')
@section('content')
    <div class="container scroll-y">
        @include('personal.comment.includes.header')
        <div class="container">
            <div class="row">
                <form action="{{ route('personal.comment.update', $comment->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <textarea name="message" placeholder="Comment" required>{{ $comment->message }}</textarea>
                    <br>
                    <br>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('personal.comment.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
