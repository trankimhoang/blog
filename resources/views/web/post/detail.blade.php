@extends('layouts.master_user')
@section('page_title')
    <div class="site-heading">
        <h3>{{ $post->name }}</h3>
        <p class="post-meta">{{ __('Posted by') }} {{ $post->admin->name }} {{ __('on') }} {{ $post->created_at }}</p>
        <p class="post-meta">
            <i class="fa fa-eye"></i>
            {{ __('View', ['view' => $post->view]) }}
        </p>
    </div>
@endsection
@section('content')
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div>{{ $post->content }}</div>
                </div>
            </div>

            @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                <form action="" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="form-group text-center">
                        <textarea name="comment" cols="30" rows="10" class="form-control"></textarea>
                        <button type="submit" class="btn btn-primary mt-2">{{ __('Comment') }}</button>
                    </div>
                </form>
            @else
                <p>
                    <span>{{ __('Please login to comment') }}</span>
                    <p>
                        <a href="{{ route('web.login') }}">{{ __('Login') }}</a>
                    </p>
                </p>
            @endif
        </div>
    </article>
@endsection
