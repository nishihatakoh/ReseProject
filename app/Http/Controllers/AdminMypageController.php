<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminMypageRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Owner;

class AdminMypageController extends Controller
{
    public function index(){
        return view('Admin/admin_mypage');
    }

    //店舗代表者新規登録アクション
    public function create(AdminMypageRequest $request)
    {
        $owner_name = $request->owner_name;
        $email = $request->email;
        $password = $request->password;
        Owner::create([
            'owner_name' => $owner_name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
        return view('Admin/admin_done');
    }



    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('admin.login.index');
}
}
