<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    
    public function register(RegisterRequest $request)
    {
        $user_name = $request->user_name;
        $email = $request->email;
        $password = $request->password;
        User::create([
            'user_name' => $user_name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
        return view('thanks');
    }
}
