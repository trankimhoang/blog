<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showFormRegister(){
        return view('web.auth.register');
    }

    public function register(UserRegisterRequest $request){
        try {
            $user = new User();
            $data = $request->only(['name', 'email', 'password']);
            $data['password'] = Hash::make($data['password']);
            $user->fill($data);

            $user->save();
            return redirect()->route('web.login')->with('success', __('Register success'));
        }catch (\Exception $exception){
            Log::error($exception->getMessage());

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function showFormLogin(){
        return view('web.auth.login');
    }

    public function login(UserLoginRequest $request){
        try {
            $email = $request->get('email');
            $password = $request->get('password');

            if (Auth::guard('web')->attempt([
                'email' => $email,
                'password' => $password
            ])){
                return redirect()->route('web.index');
            }

            return redirect()->back()->with('error', __('Login fail'));
        }catch (\Exception $exception){
            Log::error($exception->getMessage());

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('web.logout')->with('success', __('Logout success'));
    }

}
