<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Mail\Mail;

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
        $user = User::create([
            'user_name' => $user_name,
            'email' => $email,
            'password' => Hash::make($password),
            'remember_token' => base64_encode($email),
        ]);
        
        event(new Registered($user));

        return view('pre_register');

        
    }
}
