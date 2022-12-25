<div class="post-preview">
    <a href="">
        <h2 class="post-title">{{ $post->name }}</h2>
        <h3 class="post-subtitle">{{ $post->content }}</h3>
    </a>
    <p class="post-meta">{{ __('Posted by') }} {{ $post->admin->name }} {{ $post->create_at }}</p>
</div>
<!-- Divider-->
<hr class="my-4" />
