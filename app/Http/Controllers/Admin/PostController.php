<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$listPost = Post::with(['Admin'])->paginate(10);
        $listPost = Post::with(['admin'])->paginate(10);
        return view('admin.post.index', compact('listPost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        try {
            $data = $request->only(['name', 'content']);
            $data['admin_id'] = Auth::guard('admin')->user()->id;

            $post = new Post();
            $post->fill($data);

            $post->save();

            return redirect()->route('admin.post.index');


        } catch (\Exception $exception){
            Log::error($exception->getMessage());

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        try {
            $data = $request->only(['name', 'content']);
            $post = Post::find($id);
            $post->fill($data);

            $post->save();
            return redirect()->route('admin.post.index')->with('success', __('Edit success', ['id'=>$id]));

        } catch (\Exception $exception){
            Log::error($exception->getMessage());

            return redirect()->back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $post = Post::find($id);
            $post->delete();
            return redirect()->route('admin.post.index')->with('success', __('Delete success', ['id' => $id]));
        }catch (\Exception $exception){
            Log::error($exception->getMessage());

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
