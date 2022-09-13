<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;
use Stripe\Stripe;
use Stripe\Charge;

class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reserves = Reserve::where('user_id', Auth::id())->get();
        $favorites = Favorite::where('user_id', Auth::id())->get();
        return view('mypage' , compact('reserves' , 'user','favorites'));
    }



    public function delete(Request $request)
    {
        Reserve::find($request->id)->delete();
        return redirect('/mypage');
    }

    public function detail(Request $request)
    {
        $shop = Shop::where('id' ,$request->id)->first();
        return view('shop_detail' , compact('shop'));
    }

    public function unfavorite(Request $request)
    {
        Favorite::find($request->id)->delete();
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
        $reserve = Reserve::where('id', $request->id)->first();
        return view('qrcode',compact('reserve'));
    }

    public function qrcodedetail ($id)
    {


        $reserve = Reserve::where('id', $id)->first();
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
}
