<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shop;
use App\Models\favorite;
use App\Models\areamaster;
use App\Models\genremaster;
use Illuminate\Support\Facades\Auth;

class ShopAllController extends Controller
{
    public function index(Request $request)
    {
        $items = shop::with('genre')->with('area')->get();
        $areamasters = areamaster::all();
        $genremasters = genremaster::all();
        $favorite = favorite::all()->first();
        return view('shop_all' , compact('items','areamasters', 'genremasters','favorite'));
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
        $favorite = favorite::all()->first();

        return view('shop_all', compact('items', 'shop_name', 'area_id', 'genre_id','areamasters', 'genremasters','favorite'));
    }

    public function detail(Request $request)
    {
        $shop = Shop::find($request->id);
        return view('shop_detail' , compact('shop'));
    }

    public function favorite(Request $request)
    {
        $id = Auth::user()->id;
        $shop_id = $request->shop_id;
        $favorite = new favorite;
        $shop = shop::findOrFail($shop_id);

        if ($favorite->favorite_exist($id, $shop_id)) {
            $favorite = favorite::where('shop_id', $shop_id)->where('user_id', $id)->delete();
        } else {
            $favorite = new favorite;
            $favorite->shop_id = $request->shop_id;
            $favorite->user_id = Auth::user()->id;
            $favorite->save();
        }
        return back();
    }
}
