@extends('layouts.master_admin')
@section('page_title', __('Edit admin'))
@section('content')
    <form action="{{ route('admin.admin.update', $admin->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $admin->name) }}">
        </div>

        <div class="form-group">
            <label for="">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control" value="{{ old('name', $admin->email) }}">
        </div>

        <div class="form-group">
            <label for="">{{ __('Password') }}</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
@endsection
