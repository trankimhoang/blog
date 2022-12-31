<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){
        $listPost = Post::with(['admin'])->paginate(5);
        return view('web.home.index', compact('listPost'));
    }
}

