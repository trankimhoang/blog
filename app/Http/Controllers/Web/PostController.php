<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function detail($id){
        $post = Post::find($id);
        $post->view++;
        $post->save();

        return view('web.post.detail', compact('post'));
    }
}
