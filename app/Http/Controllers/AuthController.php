<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
{
    return view('auth.login'); // Vista del formulario
}

public function login(Request $request)
{
    // Validar entrada
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // Intentar autenticar
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/products'); // Redirigir tras login exitoso
    }

    // Si falla
    return back()->withErrors([
        'email' => 'Las credenciales no coinciden con nuestros registros.',
    ])->onlyInput('email');
}

public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login'); // Redirigir al login
}
public function showRegisterForm()
{
    return view('auth.register'); // Retorna la vista del formulario de registro
}

public function register(Request $request)
{
    // Validar entrada
    $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', 'min:8'], // Asegura que se confirme la contraseña
    ]);


    // Crear usuario
    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
    ]);

    // Autenticar al usuario después del registro
    auth()->login($user);

    // Redirigir a una página protegida
    return redirect('/products')->with('success', 'Registro exitoso');
}





}
