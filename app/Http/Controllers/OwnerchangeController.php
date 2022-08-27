<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\reserve;
use App\Models\owner;
use App\Models\areamaster;
use App\Models\genremaster;
use App\Models\shop;


class OwnerchangeController extends Controller
{
    public function index(Request $request)
    {
        $owner = Auth::guard('owners');
        $areamasters = areamaster::all();
        $genremasters = genremaster::all();
        $shop = shop::where('owner_id', Auth::guard('owners')->id())->first();
        
        
        if(is_null($shop)){
            return view('Owner/owner_mypage');
        }else{
            
            $reserves =reserve::where('shop_id',$shop->id)->get();
        return view('Owner/owner_change', compact('owner', 'areamasters', 'genremasters','shop','reserves'));

        }

    }
}
