<div class="card p-3 mt-2">
    <div class="d-flex justify-content-between align-items-center">
        <div class="user d-flex flex-row align-items-center">
            <img src="{{ $comment->user->getImage() }}" width="30" class="user-img rounded-circle mr-2">
            <span><small class="font-weight-bold text-primary p-lg-2">{{ $comment->user->name  }}</small> <small class="font-weight-bold">{{ $comment->content }}</small></span>
        </div>
        <small>{{ $comment->created_at }}</small>
    </div>
</div>
