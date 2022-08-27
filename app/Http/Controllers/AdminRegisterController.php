<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    public function index()
    {
        return view('Admin/Admin_register');
    }
    
    public function register(RegisterRequest $request)
    {
        $user_name = $request->user_name;
        $email = $request->email;
        $password = $request->password;
        Admin::create([
            'user_name' => $user_name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
        return view('Admin/Admin_login');
    }
}
