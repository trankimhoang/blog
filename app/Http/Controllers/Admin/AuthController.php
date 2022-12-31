<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showFormLogin(): View {
        return view('admin.auth.login');
    }

    public function login(AdminLoginRequest $request): \Illuminate\Http\RedirectResponse {
        $email = $request->get('email');
        $password = $request->get('password');

        if (Auth::guard('admin')->attempt([
            'email' => $email,
            'password' => $password
        ])){
            return redirect()->route('admin.index');
        }

        return redirect()->back()->with('error', __('Login fail'));
    }

    public function logout(): \Illuminate\Http\RedirectResponse {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
