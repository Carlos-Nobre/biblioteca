<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        
        return view('login');

    }

    public function auth(Request $request){

        $login = $request->validate([
            'email' => ['required','email'],
            'password'=>['required']
        ]);

        if(Auth::attempt($login)){

            $request->session()->regenerate();

            return redirect()->intended('home');
        }
        else{

            return redirect()->back()->with('message','Email ou senha incorretos');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
        
    }
}
