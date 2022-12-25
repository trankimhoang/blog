<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $search = $request->get('search');

        $listPost = Post::with(['admin'])->where('name', 'like', '%' . $search . '%')->paginate(5);

        return view('web.search.index', ['listPost' => $listPost]);
    }
}
