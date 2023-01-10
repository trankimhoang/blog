<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class PostController extends Controller {
    public function detail($id): View {
        $post = Post::find($id);
        $post->view++;
        $post->save();

        return view('web.post.detail', compact('post'));
    }

    public function comment(PostCommentRequest $request) {
        try {
            $comment = new Comment();
            $comment->setAttribute('post_id', $request->get('post_id'));
            $comment->setAttribute('user_id', Auth::guard('web')->user()->getAttribute('id'));
            $comment->setAttribute('content', $request->get('comment'));

            $comment->save();
            return view('web.comment.item_comment', compact('comment'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage());
        }

    }
}
