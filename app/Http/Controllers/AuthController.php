<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function showFormLogin(){
        $title = 'Login';
        return view('auth.login', compact('title'));
    }



    public function login(Request $request){
        // dd($request);
        $user = $request->validate([
            'email'=> 'required|string|email|max:255',
            'password' => 'required|string',
    
        ]);
    //    dd($user);
        
        if(Auth::attempt($user)){
            
            if(Auth::check() && Auth::user()->role === User::ROLE_ADMIN){
                return redirect()->intended('/admins/dashboard');
            }
            return redirect()->intended('/');
        }

            return redirect()->back()->withErrors([
                'email' => 'Thông tin người dùng không đúng'
            ]);

    }


    public function showFormRegister(){
        $title = 'Register';
        return view('auth.register', compact('title'));
    }



    public function register(AuthRequest $request){
        
        $data = $request->except('_token');
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            
            'password' => Hash::make($data['password']),
        ]);
        Auth::login($user);

        return redirect()->route('trang_chu');
        // dd($data);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }

    


}
