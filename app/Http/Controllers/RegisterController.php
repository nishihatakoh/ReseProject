<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    
    public function register(RegisterRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        User::create($form);
        return view('thanks');
    }
}
