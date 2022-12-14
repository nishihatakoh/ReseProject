<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OwnerCreateRequest;
use App\Models\Area;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;

class OwnerCreateController extends Controller
{
    public function index(Request $request)
    {
        $owner = Auth::guard('owners')->id();
        $areamasters = Area::all();
        $genremasters = Genre::all();

        return view('Owner/owner_create', compact('owner', 'areamasters', 'genremasters'));
    }

    public function create(OwnerCreateRequest $request)
    {
        $shop_name = $request->shop_name;
        $area_id = $request->area_id;
        $genre_id = $request->genre_id;
        $text = $request->text;
        $owner_id = $request->owner_id;
        
        $image = base64_encode(file_get_contents($request->image->getRealPath()));
        
        $name=request()->file('image')->getClientOriginalName();
        $file=request()->file('image')->move('storage/images/'.$owner_id ,$name);
        // ローカル環境で保存する際には以下のコードでMTSQLのDBに保存します。
        // $image = 'storage/images/'.$owner_id.'/'.$name;

        Shop::create([
            'shop_name' => $shop_name,
            'area_id' => $area_id,
            'genre_id' => $genre_id,
            'text' => $text,
            'owner_id' => $owner_id,
            'image' => $image
        ]);

        

        return view('Owner/owner_mypage');

    }
}
