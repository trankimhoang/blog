@extends('layouts.master_admin')
@section('page_title', __('Add Category'))
@section('content')
    <form action="{{ route('admin.category.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
@endsection
