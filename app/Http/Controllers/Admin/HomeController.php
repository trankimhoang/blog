<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View {
        $listTopComment = Comment::with(['post'])
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->get();

        return view('admin.home.index', compact('listTopComment'));
    }
}
