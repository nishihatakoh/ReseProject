<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;
use App\Models\owner;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;

class OwnerMypageController extends Controller
{
    public function index (Request $request)
    {
        return view('Owner/Owner_mypage');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('owner.login.index');
    }
}
