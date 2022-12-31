@extends('layouts.master_user')\
@section('content')
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{ route('web.login.post') }}" method="post">
                            @csrf
                            <h3 class="text-center text-info">{{ __('Login') }}</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">{{ __('Email') }}</label><br>
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}">

                                @error('email')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">{{ __('Password') }}</label><br>
                                <input type="password" name="password" class="form-control" value="{{ old('password') }}">

                                @error('password')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group text-center mt-2">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="{{ __('Login') }}">
                                <p>
                                    <a href="{{ route('web.register') }}">{{ __('Register') }}</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
