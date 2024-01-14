<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login (){
        return view(view:'login.login');
    }
    function registration (){
        return view(view:'login.registration');
    }
    function loginPost(Request $request){
     $request->validate([
        'email' => 'required',
        'password' => 'required'
     ]);
     $credentials = $request->only('email', 'password');
     if(Auth::attempt($credentials)){
        return redirect()->intended(route('siswa.index'));
     }
     return redirect()->route('login')->with('error', 'Login detail are invalid');
    }
    function registrationPost(Request $request){
        $request->validate([
           'name' => 'required',
           'email' => 'required|email|unique:users',
           'password' => 'required'
        ]);
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $user = User::create($data);
        if (!$user){
            return redirect()->route('registration')->with('error', 'Registration failed, try again.');        
        }
                return redirect()->route('login')->with('success', 'Registration successful. Please login.');

}
function logout(){
    Session ::flush();
    Auth :: logout();
    return redirect()->route('login');
}
}