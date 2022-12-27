<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function index(){
        $listComment = Comment::paginate(5);
        return view('admin.comment.index', compact('listComment'));
    }

    public function destroy($id)
    {
        try {
            $comment = Comment::find($id);
            $comment->delete();
            return redirect()->back()->with('success', __('Delete success', ['id' => $id]));
        }catch (\Exception $exception){
            Log::error($exception->getMessage());

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
