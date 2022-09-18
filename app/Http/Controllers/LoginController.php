<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginStoreRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('backend.pages.auth.login');
    }
    public function login(LoginStoreRequest $request)
    {
        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(Auth::attempt($credentials,$request->filled('remember_me'))){
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email'=>'The email is not valiad, Please enter valid email address',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.loginpage');

    }
}
