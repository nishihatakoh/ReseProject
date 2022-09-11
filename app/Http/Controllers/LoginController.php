<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AllLoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    
    public function login(AllLoginRequest $request)
    {
        $credentials = $request->only('email' , 'password');

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect('mypage');
        }

        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが違います。',
        ]);
    }
}
