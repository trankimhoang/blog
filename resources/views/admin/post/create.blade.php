@extends('layouts.master_admin')
@section('content')
    <form action="{{ route('admin.post.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">{{ __('Content') }}</label>
            <textarea name="content" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>
            @error('content')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
@endsection
