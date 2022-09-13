<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;
use App\Models\Shop;

class OwnerReserveController extends Controller
{
    public function index(Request $request)
    {
        $shop = Shop::where('owner_id', Auth::guard('owners')->id())->first();

        if(is_null($shop)){
            return view('Owner/owner_mypage');
        }else{
        $reserves = Reserve::where('shop_id',$shop->id)->get();

        return view('Owner/owner_reserve', compact('shop','reserves'));
        }
    }
}
