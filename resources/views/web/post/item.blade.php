<div class="post-preview">
    <a href="{{ route('web.detail', ['id'=>$post->id]) }}">
        <h2 class="post-title">{{ $post->name }}</h2>
        @if(strlen($post->content) > 100)
            <h3 class="post-subtitle">{{ mb_substr($post->content, 0, 100) }}</h3>
        @else
            <h3 class="post-subtitle">{{ $post->content}}</h3>
        @endif

    </a>
    <p class="post-meta">{{ __('Posted by') }} {{ $post->admin->name }} {{ __('on') }} {{ $post->created_at }}</p>
    <p class="post-meta">
        <i class="fa fa-eye"></i>
        {{ __('View', ['view' => $post->view]) }}
    </p>
    <p class="post-meta">
        <a href="{{ route('web.detail', ['id'=>$post->id]) }}">
            <img src="{{ $post->getImage() }}" alt="">
        </a>
    </p>

</div>
<!-- Divider-->
<hr class="my-4" />
