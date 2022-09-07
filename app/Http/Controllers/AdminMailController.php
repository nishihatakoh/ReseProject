<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\AdminMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AdminMailController extends Controller
{
    public function index()
    {
        $users = user::all();
        return view('Admin/Admin_allmail',compact('users'));
    }

    public function send(Request $request)
    {
        $user = user::where('id',$request->id)->first();
        return view('Admin/admin_usermail',compact('user'));
    }

    public function sendmail(Request $request)
    {
        
        $toUser = user::where('id',$request->id)->first();
        $text = $request->text;
        $username = $request->user_name;
        


        Mail::to($toUser->email)->send(new AdminMail($text,$username));

        return view('admin.admin_mypage');
    }
}