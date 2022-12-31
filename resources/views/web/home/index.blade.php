@extends('layouts.master_user')

@section('page_title')
    <div class="site-heading">
        <h1>{{ __('Home') }}</h1>
    </div>
@endsection

@section('content')
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                @foreach($listPost as $post)
                    @include('web.post.item', ['post' => $post])
                @endforeach
            </div>
        </div>
    </div>
    <div>{{ $listPost->render() }}</div>
@endsection
