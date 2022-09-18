<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomarRegisterStoreRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerPage()
    {
        return view('frondend.auth.register');
    }

    public function registerStore(CustomarRegisterStoreRequest $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make( $request->password),
        ]);

        $credentials = [
            'email'=> $request->email,
            'password'=> $request->password,
        ];
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->route('customar.dashboard');
        }

        return back()->withErrors([
            'email'=>'Your information is wrong,please provide right information'
        ])->onlyInput('email');
    }

    public function loginPage()
    {
        return view('frondend.auth.login');
    }

    public function loginStore(Request $request)
    {
        $validate = $request->validate([
            'email'=>'bail|required|email',
            'password'=>'bail|required',
        ]);
        $credentials = [
            'email'=> $request->email,
            'password'=> $request->password,
        ];
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->route('customar.dashboard');
        }

        return back()->withErrors([
            'email'=>'Your information is wrong,please provide right information'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.page');
    }
}
