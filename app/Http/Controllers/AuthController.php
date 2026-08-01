<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\userModel;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('nivelLogin.login'); // sua view de login em resources/views/auth/login.blade.php
    }

    public function login(Request $request)
    {
        
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
            ]); 

    if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['senha']])) {
        $request->session()->regenerate();

        return redirect()->route('tarefas.index'); // rota da tela principal
    }

    return back()->withErrors([
        'email' => 'Credenciais inválidas.',
    ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}