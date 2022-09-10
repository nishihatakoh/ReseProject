<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Requests\OwnerLoginRequest;
use Illuminate\Support\Facades\Auth;

class OwnerLoginController extends Controller
{
    public function index()
    {
        return view('Owner/Owner_login');
    }

    public function login(OwnerLoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('owners')->attempt($credentials)) {
            return redirect()->route('owner.mypage.index');
        }

        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが違います。',
        ]);
    }
}
