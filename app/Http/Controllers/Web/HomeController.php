<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller {
    public function index(): View {
        $listPost = Post::with(['admin'])->paginate(5);
        return view('web.home.index', compact('listPost'));
    }
}

