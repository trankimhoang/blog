<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>


<body>
<div id="login">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <form id="login-form" class="form" action="{{ route('admin.login.post') }}" method="post">
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
                        <div class="form-group text-center">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="{{ __('Login') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #17a2b8;
        height: 100vh;
    }
    #login .container #login-row #login-column #login-box {
        margin-top: 120px;
        max-width: 600px;
        height: 320px;
        border: 1px solid #9C9C9C;
        background-color: #EAEAEA;
    }
    #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
    }
    #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
    }
</style>
</body>

</html>
