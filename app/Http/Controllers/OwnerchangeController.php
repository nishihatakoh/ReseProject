<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;
use App\Models\Owner;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Http\Requests\OwnerChangeRequest;


class OwnerchangeController extends Controller
{
    public function index(Request $request)
    {
        $owner = Auth::guard('owners')->id();
        $areamasters = Area::all();
        $genremasters = Genre::all();
        $shops = Shop::where('owner_id', $owner)->get();
        
        
        if(is_null($shops)){
            return view('Owner/owner_mypage');
        }else{
            
        return view('Owner/owner_change', compact('owner', 'areamasters', 'genremasters','shops',));

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
        
        $name=request()->file('image')->getClientOriginalName();
        $file=request()->file('image')->move('storage/images/'.$owner_id ,$name);
        // ローカル環境で保存する際には以下のコードでMTSQLのDBに保存します。
        // $image = 'storage/images/'.$owner_id.'/'.$name;
        
        Shop::where('id', $request->id)->update([
            'shop_name' => $shop_name,
            'area_id' => $area_id,
            'genre_id' => $genre_id,
            'text' => $text,
            'image' => $image_binary
        ]);

        return view('Owner/owner_mypage');
    }
}
