<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\reserve;
use App\Models\owner;
use App\Models\areamaster;
use App\Models\genremaster;
use App\Models\shop;

class OwnerMypageController extends Controller
{
    public function index (Request $request)
    {
        return view('Owner/owner_mypage');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('owner.login.index');
    }
}
