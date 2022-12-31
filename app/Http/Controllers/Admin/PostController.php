<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        $listPost = Post::with(['admin'])->paginate(5);
        return view('admin.post.index', compact('listPost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCategory = Category::all();
        return view('admin.post.create', compact( 'listCategory'));
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
            $data = $request->all();
            $data['admin_id'] = Auth::guard('admin')->user()->id;

            $post = new Post();
            $post->fill($data);

            if ($request->has('image')) {
                $imagePath = 'post_images/' . $post->getAttribute('id');
                $imageUrl = updateImage($request->file('image'), 'avatar', $imagePath);
                $post->setAttribute('image', $imageUrl);
                $post->save();
            }

            $post->save();


            $listUserSendMail = User::all();
            foreach ($listUserSendMail as $userSendMail){
                Mail::send('emails.test', ['userSendMail' => $userSendMail, "post"=>$post], function($message) use ($userSendMail) {
                    $message->to($userSendMail->email, $userSendMail->name)->subject(__('Post new'));
                });
            }

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
        $listCategory = Category::all();

        return view('admin.post.edit', compact('post', 'listCategory'));
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
            $data = $request->all();
            $post = Post::find($id);
            $post->fill($data);

            // nay check có cái file hay khong ne
            if ($request->has('image')) {
                $imagePath = 'post_images/' . $post->getAttribute('id');
                $imageUrl = updateImage($request->file('image'), 'avatar', $imagePath);
                $post->setAttribute('image', $imageUrl);
                $post->save();
            }

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
    public function deleteAll(Request $request){
        try {
            $listId = $request->get('list_post_delete');
            DB::table('posts')->whereIn('id', array_keys($listId))->delete();
            return redirect()->route('admin.post.index')->with('success', __('Delete success', ['id' => implode(',', array_keys($listId))]));
        }catch (\Exception $exception){
            Log::error($exception->getMessage());

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
