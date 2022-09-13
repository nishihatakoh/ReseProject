<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AllLoginRequest;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('Admin/admin_login');
    }

    public function login(AllLoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('admins')->attempt($credentials)) {
            return redirect('/admin');
        }

        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが違います。',
        ]);
    }
}
