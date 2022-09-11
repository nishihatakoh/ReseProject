<?php

namespace App\Http\Controllers;
use App\Models\shop;
use Illuminate\Support\Facades\Auth;
use App\Models\review;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
        $shop = shop::where('id' ,$id)->first();
        $reviews = review::where('shop_id',$id)->get();
        return view('review',compact('shop','reviews'));
    }

    public function review(Request $request){
        
        $user = Auth::user();
        $user_id = $user->id;
        $shop_id = $request->shop_id;
        $star = $request->star;
        $comment = $request->comment;

        Review::create([
            'user_id' => $user_id,
            'shop_id' => $shop_id,
            'star' => $star,
            'comment' => $comment,
        ]);
        return redirect('/');
    }
}
