<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReserveRequest;

class ChangeController extends Controller
{
    public function index (Request $request)
    {
        $id = $request->id;
        $reserve = Reserve::with('shop')->where('id', '=', $id)->first();
        return view('change',compact('reserve'));
    }

    public function change (ReserveRequest $request)
    {
        $form=$request->all();
        unset($form['_token']);
        Reserve::where('id', $request->id)->update($form);
        return redirect('mypage');
    }
}
