@extends('layouts.master_admin')
@section('page_title', __('Add Post'))
@section('content')
    <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="category_id">{{ __('Category') }}</label>
            <select name="category_id" class="form-control">
                <option value="">{{ __('Add Category') }}</option>
                @foreach($listCategory as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <img src="" width="256px" class="img-preview">
            <label for="image">{{ __('Image') }}</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
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

@section('js')
    <script>
        $(document).ready(function () {
            $('#image').change(function (event) {
                $(".img-preview").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
            });
        });
    </script>
@endsection
