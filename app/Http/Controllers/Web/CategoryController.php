<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category($id){
        $category = Category::find($id);
        $listPost = Post::where('category_id', '=', $id)->paginate(5);

        return view('web.category.index', compact('category', 'listPost'));
    }
}
