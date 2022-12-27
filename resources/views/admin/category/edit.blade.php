@extends('layouts.master_admin')
@section('page_title', __('Edit Category'))
@section('content')
    <form action="{{ route('admin.category.update', $category->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="id">{{ __("ID") }}</label>
            <input type="text" readonly name="id" class="form-control" value="{{ old('id', $category->id) }}">
        </div>
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
            @error('name')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
@endsection
