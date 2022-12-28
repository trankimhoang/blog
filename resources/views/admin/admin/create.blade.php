@extends('layouts.master_admin')
@section('page_title', __('Add Admin'))
@section('content')
    <form action="{{ route('admin.admin.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="">{{ __('Password') }}</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
@endsection
