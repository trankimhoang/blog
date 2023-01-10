<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function index(): View {
        $listComment = Comment::paginate(5);
        return view('admin.comment.index', compact('listComment'));
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse {
        try {
            $comment = Comment::find($id);
            $comment->delete();

            return redirect()->back()->with('success', __('Delete success', ['id' => $id]));
        } catch (\Exception $exception){
            Log::error($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

}
