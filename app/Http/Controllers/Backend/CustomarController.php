<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomarController extends Controller
{
    public function index()
    {
        $customers = User::where('role_id', 2)->select('id','name','email','phone','created_at')->latest('id')->paginate(15);
        return view('backend.pages.customar.index',compact('customers'));
    }
}
