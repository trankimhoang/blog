<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function detail($id){
        $post = Post::find($id);
        $post->view++;
        $post->save();

        return view('web.post.detail', compact('post'));
    }

    public function comment(PostCommentRequest $request){
        $comment = new Comment();
        $comment->setAttribute('post_id', $request->get('post_id'));
        $comment->setAttribute('user_id', Auth::guard('web')->user()->id);
        $comment->setAttribute('content', $request->get('comment'));

        $comment->save();
        return redirect()->route('web.detail', $request->get('post_id'))->with('success', __('Comment success'));

    }
}
