<div class="container mt-5 result">
    <div class="row  d-flex justify-content-center">
        <div class="col-md-8">
            <div class="headings d-flex justify-content-between align-items-center mb-3">
                <h5>{{ __('Comment') }}</h5>
            </div>
            <div id="list-comment">
                @foreach($post->comments as $comment)
                    @include('web.comment.item_comment', compact('comment'))
                @endforeach
            </div>
        </div>
    </div>
</div>
