<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function showFormProfile(): View {
        $profileUser = Auth::guard('web')->user();

        if (empty($profileUser)) {
            abort(404);
        }

        return view('web.profile.index', compact('profileUser'));
    }

    public function profile(UserProfileRequest $request, $id): \Illuminate\Http\RedirectResponse {
        try {
            $profileUser = User::find($id);
            $data = $request->all();

            if (!empty($data['password'])){
                $data['password'] = Hash::make($request->get('password'));
            } else {
                unset($data['password']);
            }

            $profileUser->fill($data);

            if ($request->has('image')) {
                $imagePath = 'user_images/' . $profileUser->getAttribute('id');
                $imageUrl = updateImage($request->file('image'), 'avatar', $imagePath);
                $profileUser->setAttribute('image', $imageUrl);
            }

            $profileUser->save();

            return redirect()->route('web.profile')->with('success', __('Edit success', ['id'=>$id]));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
