@extends('layouts.master_user')

@section('page_title')
    <div class="site-heading">
        <h1>{{ __('Edit Profile') }}</h1>
    </div>
@endsection

@section('content')
    <form action="{{ route('web.profile.post', $profileUser->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $profileUser->name) }}">
        </div>

        <div class="form-group">
            <label for="">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control" value="{{ old('name', $profileUser->email) }}">
        </div>

        <div class="form-group">
            <img src="{{ $profileUser->getImage() }}" width="256px" class="img-preview">
            <label for="image">{{ __('Image') }}</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="">{{ __('Password') }}</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}" autocomplete="off">
        </div>

        <div class="form-group text-center mt-2 mb-2">
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
