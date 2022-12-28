<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listAdmin = Admin::all();
        return view('admin.admin.index', compact('listAdmin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $admin = new Admin();
            $admin->setAttribute('name', $request->get('name'));
            $admin->setAttribute('email', $request->get('email'));
            $admin->setAttribute('password', Hash::make($request->get('password')));
            $admin->save();

            return redirect()->route('admin.admin.index')->with('success', __('Add success'));
        } catch (\Exception $exception) {
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
        $admin = Admin::find($id);
        return view('admin.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $admin = Admin::find($id);
            $admin->setAttribute('name', $request->get('name'));

            $admin->setAttribute('email', $request->get('email'));
            if (!empty($request->get('password'))){
                $admin->setAttribute('password', Hash::make($request->get('password')));
            }
            $admin->save();

            return redirect()->route('admin.admin.index')->with('success', __('Edit success', ['id'=>$id]));
        } catch (\Exception $exception) {
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
            $admin = Admin::find($id);
            $admin->delete();
            return redirect()->back()->with('success', __('Delete success', ['id' => $id]));
        }catch (\Exception $exception){
            Log::error($exception->getMessage());

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
