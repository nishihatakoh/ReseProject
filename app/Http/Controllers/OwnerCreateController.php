<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\areamaster;
use App\Models\genremaster;
use Illuminate\Support\Facades\Auth;

class OwnerCreateController extends Controller
{
    public function index(Request $request)
    {
        $owner = Auth::guard('owners')->id();
        $areamasters = areamaster::all();
        $genremasters = genremaster::all();

        return view('Owner/owner_create', compact('owner', 'areamasters', 'genremasters'));
    }

    
}
