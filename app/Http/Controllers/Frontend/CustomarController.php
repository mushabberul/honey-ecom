<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomarController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('frondend.pages.customer-dashboard',compact('user'));
    }
}
