@extends('layouts.master_admin')
@section('page_title', __('Edit admin'))
@section('content')
    <form action="{{ route('admin.admin.update', $admin->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $admin->name) }}">
        </div>

        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control" value="{{ old('name', $admin->email) }}">
        </div>

        <div class="form-group">
            <img src="{{ $admin->getImage() }}" width="256px" class="img-preview">
            <label for="image">{{ __('Image') }}</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}"
                   autocomplete="off">
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
