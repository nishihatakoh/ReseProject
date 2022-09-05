<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use App\Models\shop;
use App\Models\user;
use App\Models\reserve;
use Illuminate\Support\Facades\Auth;

class Shop_detailController extends Controller
{
    public function index(Request $request){
        $shop = shop::where('id' , $request->id)->first();
        return view('shop_ditail',compact('shop'));
    }

    public function reserve(ReserveRequest $request)
    {
        $id = Auth::id();
        $shop_id = $request->shop_id;
        $date = $request->date;
        $time = $request->time;
        $number = $request->number;
        Reserve::create([
            'user_id' => $id,
            'shop_id' => $shop_id,
            'date' => $date,
            'time' => $time,
            'number' => $number,
        ]);
        return view('done');
    }
}
