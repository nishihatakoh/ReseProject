<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\favorite;
use App\Models\shop;
use Illuminate\Support\Facades\Auth;
use App\Models\reserve;
use Stripe\Stripe;
use Stripe\Charge;

class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reserves = Reserve::where('user_id', Auth::id())->get();
        $favorites = favorite::where('user_id', Auth::id())->get();
        return view('mypage' , compact('reserves' , 'user','favorites'));
    }



    public function delete(Request $request)
    {
        reserve::find($request->id)->delete();
        return redirect('/mypage');
    }

    public function detail(Request $request)
    {
        $shop = shop::find($request->id);
        return view('shop_detail' , compact('shop'));
    }

    public function unfavorite(Request $request)
    {
        favorite::find($request->id)->delete();
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.index');
    }

    public function qrcode(Request $request)
    {
        $reserve = reserve::where('id', $request->id)->first();
        return view('qrcode',compact('reserve'));
    }

    public function qrcodedetail ($id)
    {


        $reserve = reserve::where('id', $id)->first();
        return view('qrcodedetail',compact('reserve'));
    }

    public function charge(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $charge = Charge::create(array(
            'amount' => 100,
            'currency' => 'jpy',
            'source'=> request()->stripeToken,
        ));
        return back();
    }

    public function aaa()
    {
        return view('owner/owner_create');
    }
}
