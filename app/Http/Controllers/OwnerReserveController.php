<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\reserve;
use App\Models\shop;

class OwnerReserveController extends Controller
{
    public function index(Request $request)
    {
        $shop = shop::where('owner_id', Auth::guard('owners')->id())->first();

        if(is_null($shop)){
            return view('owner/owner_mypage');
        }else{
        $reserves =reserve::where('shop_id',$shop->id)->get();

        return view('Owner/owner_reserve', compact('shop','reserves'));
        }
    }
}
