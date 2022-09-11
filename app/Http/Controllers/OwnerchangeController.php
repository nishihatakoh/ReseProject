<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\reserve;
use App\Models\owner;
use App\Models\areamaster;
use App\Models\genremaster;
use App\Models\shop;
use App\Http\Requests\OwnerChangeRequest;


class OwnerchangeController extends Controller
{
    public function index(Request $request)
    {
        $owner = Auth::guard('owners')->id();
        $areamasters = areamaster::all();
        $genremasters = genremaster::all();
        $shops = shop::where('owner_id', $owner)->get();
        
        
        if(is_null($shops)){
            return view('Owner/Owner_mypage');
        }else{
            
        return view('Owner/Owner_change', compact('owner', 'areamasters', 'genremasters','shops',));

        }

    }

    public function change(OwnerChangeRequest $request)
    {
        $shop_name = $request->shop_name;
        $area_id = $request->area_id;
        $genre_id = $request->genre_id;
        $text = $request->text;
        $owner_id = $request->owner_id;

        
        $image_binary = base64_encode(file_get_contents($request->image->getRealPath()));
        //　ローカル環境でのストレージへの保存コード
        // $name=request()->file('image')->getClientOriginalName();
        // $file=request()->file('image')->move('storage/images/'.$owner_id ,$name);
        // $image = 'storage/images/'.$owner_id.'/'.$name
        
        shop::where('id', $request->id)->update([
            'shop_name' => $shop_name,
            'area_id' => $area_id,
            'genre_id' => $genre_id,
            'text' => $text,
            'image' => $image_binary
        ]);

        return view('Owner/Owner_mypage');
    }
}
