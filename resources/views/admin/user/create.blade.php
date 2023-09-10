@extends('admin.layouts.main')
@section('content')
<div class="container scroll-y">
    @include('admin.user.includes.header')
    <div class="row">
        <form action="{{ route('admin.user.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nameFormControlInput" class="form-label">Name</label>
                <input type="text" class="form-control" id="nameFormControlInput" name="name" placeholder="User name" value="{{ old('name') }}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="emailFormControlInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailFormControlInput" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="passwordFormControlInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordFormControlInput" name="password" placeholder="Password">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                    <label for="roleSelect" class="form-label">Select role</label>
                    <select id="roleSelect" class="form-select" name="role" aria-label="Role select">
                        @foreach ($roles as $id => $role)
                            <option value="{{ $id }}"
                                {{ $id == old('role') ? ' selected' : '' }}>
                                {{ $role }}
                            </option>
                        @endforeach
                    </select>
                </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('admin.user.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection