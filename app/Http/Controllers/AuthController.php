<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class AuthController extends Controller
{
    // Exibir formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Realizar login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required|string',
        ]);

        // Tentativa de login com campo personalizado (senha)
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['senha']])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Login realizado com sucesso!');
        }

        return back()->withErrors([
            'email' => 'As credenciais informadas não são válidas.',
        ])->onlyInput('email');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Sessão encerrada com sucesso.');
    }
}
