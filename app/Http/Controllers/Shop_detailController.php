<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Shop_detailController extends Controller
{
    public function index(Request $request)
    {
        $items = shop::with('genre')->with('area')->get();
        $areamasters = areamaster::all();
        $genremasters = genremaster::all();
        return view('shop_detail',compact('items','areamaster','genremaster'));
    }

    public function reserve()
    {
        
    }
}
