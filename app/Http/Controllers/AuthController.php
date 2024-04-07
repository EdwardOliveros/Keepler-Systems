<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\usuario;
use App\Models\Rol;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    protected $model = Usuario::class;

    /**
     * Muestra el formulario de inicio de sesión.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Procesa la solicitud de inicio de sesión.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('correo', 'password');


        if (!isset($credentials['password'])) {
            // Manejar el caso en que el campo 'password' no está presente en la solicitud
            return redirect()->back()->withInput()->withErrors(['password' => 'Contraseña no proporcionada']);
        }

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->route('dashboard');
        }

        // Autenticación fallida
        return back()->with('error', 'Credenciales incorrectas.')->withInput($request->except('password'));
    }

    /**
     * Cierra la sesión del usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
