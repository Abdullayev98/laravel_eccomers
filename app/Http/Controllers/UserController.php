<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/')->withSuccess('Signed in');
        }
        return redirect("login")->withSuccess('Login details are not valid');

        //$user = User::where('email',$request->email)->first();
        // if($user && Hash::check($request->password, $user->password))
        // {
        //     return redirect('/')->withSuccess('Signed in');
        // }

        // return redirect("login")->withSuccess('Login details are not valid');
                
    }
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
