<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showFormRegister(): View {
        return view('web.auth.register');
    }

    public function register(UserRegisterRequest $request): \Illuminate\Http\RedirectResponse {
        try {
            $user = new User();
            $data = $request->only(['name', 'email', 'password']);
            $data['password'] = Hash::make($data['password']);
            $user->fill($data);

            $user->save();
            return redirect()->route('web.login')->with('success', __('Register success'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function showFormLogin(): View {
        return view('web.auth.login');
    }

    public function login(UserLoginRequest $request): \Illuminate\Http\RedirectResponse {
        try {
            $email = $request->get('email');
            $password = $request->get('password');
            $data = [
                'email' => $email,
                'password' => $password
            ];

            if (Auth::guard('web')->attempt($data)) {
                return redirect()->route('web.index');
            }

            return redirect()->back()->with('error', __('Login fail'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function logout(): \Illuminate\Http\RedirectResponse {
        try {
            Auth::guard('web')->logout();
            return redirect()->route('web.logout')->with('success', __('Logout success'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
