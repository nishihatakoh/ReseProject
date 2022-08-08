<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shop;
use App\Models\areamaster;
use App\Models\genremaster;
use App\Http\Controllers\Auth;

class Shop_allController extends Controller
{
    public function index(Request $request)
    {
        $items = shop::with('genre')->with('area')->get();
        $areamasters = areamaster::all();
        $genremasters = genremaster::all();
        return view('shop_all' , compact('items','genremasters','areamasters'));
    }

    public function find(Request $request)
    {
        $query = Shop::query();

        $area_id = $request->area_id;
        $genre_id = $request->genre_id;
        $shop_name = $request->shop_name;

        if (!empty($area_id)) {
            $query->where('area_id', $area_id);
        }
        if (!empty($genre_id)) {
            $query->where('genre_id', $genre_id);
        }
        if (!empty($shop_name)) {
            $query->where('shop_name', 'like', '%'.$shop_name.'%');
        }

        $items = $query->get();
        $areamasters = areamaster::all();
        $genremasters = genremaster::all();

        return view('shop_all', compact('items', 'shop_name', 'area_id', 'genre_id', 'areamasters', 'genremasters'));
    }

    public function detail(Request $request)
    {
        $shop = Shop::find($request->id);
        return view('shop_detail' , compact('shop'));
    }
}
