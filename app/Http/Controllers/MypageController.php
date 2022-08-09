<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\reserve;

class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();
        $items = reserve::all();
        return view('mypage' , compact('items' , 'user','id'));
    }

    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login.index');
}
}
