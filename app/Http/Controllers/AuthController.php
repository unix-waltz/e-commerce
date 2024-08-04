<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
function login(){
return view('Auth.Login');
}
function _login(Request $r){
    $credentials = $r->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $r->session()->regenerate();

        return redirect()->intended('/');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
}

function register(){
 return view('Auth.Register');   
}
function _register(Request $r){
    $v = $r->validate([
'email'=> 'required|email|unique:users',
'name'=> 'min:5|string|required',
'password'=> 'min:5|required',
    ]);
$v['password'] = bcrypt($v['password']);
User::create($v);
return redirect('/login')->with(['success'=>'success register','msg'=>'success create an account!']);
}
public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
}

}
