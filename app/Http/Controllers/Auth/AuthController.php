<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function showRegister()
    {
        return view('auth.register');
    }
    
    public function register(RegisterRequest $request)
    {
        $user= new User();
    $user->password = Hash::make($request->password);
    $user->firstname = ($request->firstname);
    $user->email = ($request->email);
    $user->lastname = ($request->lastname);
            $user ->save();
        // return redirect()->route('auth.login')->with($request->only('email', 'password'));
        return redirect()->route('auth.login')->with('ok', 'Inscritpion validée');
    }
    
    public function showLogin()
    {
        return view('auth.login');
    }
    
    public function login(LoginRequest $request)
    {
        $registered = Auth::attempt($request->validated());
        
       if($registered){
        session()->regenerate();
        return redirect()->route('blog.index')->with('ok', 'connexion reussi');
    }else{
        session()->regenerate();
        return redirect()->route('auth.login')->with('ok', 'connexion echouée');
        
    }
    
}

public function logout()
{
    Auth::logout();
    return redirect()->route('blog.index')->with('ok', 'deconnexion reussi');
    }


}
