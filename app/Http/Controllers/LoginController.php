<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; // Asegúrate de importar esta clase


class LoginController extends Controller
{


public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nombre' => 'required|string|max:100',
        'email' => 'required|email|unique:usuarios,email',
        'password' => 'required|min:8',
    ]);

    if ($validator->fails()) {
        return redirect('/register')
            ->withErrors($validator)
            ->withInput();
    }

    // Formatear nombre
    $nombreFormateado = collect(explode(' ', $request->nombre))
        ->filter()
        ->map(fn($word) => Str::ucfirst(Str::lower($word)))
        ->implode(' ');

    // Email en minúscula
    $emailFormateado = Str::lower($request->email);

    // Contraseña en minúscula antes de hashear
    $passwordEnMinuscula = Str::lower($request->password);

    $usuario = new Usuario();
    $usuario->nombre = $nombreFormateado;
    $usuario->email = $emailFormateado;
    $usuario->password = Hash::make($passwordEnMinuscula);
    $usuario->imagen = 'static/avatars/avatar.jpg';
    $usuario->save();

    return redirect('login')
        ->with('type', 'success')
        ->with('message', 'Usuario registrado exitosamente. Por favor, inicia sesión.');
}


    public function check(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('login')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                ->with('message', 'Bienvenido!' . ' ' . Auth::user()->nombre);
        }

        return redirect('login')
            ->with('type', 'danger')
            ->with('message', 'Credenciales incorrectas. Por favor, intenta de nuevo.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login')
            ->with('type', 'success')
            ->with('message', 'Has cerrado sesión exitosamente.');
    }
}
