<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create () {
        // Mostrar la vista "auth.login" para el formulario de inicio de sesión
        return view('auth.login');
    }

    /**
     * Inicia sesión del usuario y redirige según su rol.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store() {
        // Intentar iniciar sesión con las credenciales proporcionadas (email y password)
        if (auth()->attempt(request(['email', 'password'])) == false) {
            // Si el intento de inicio de sesión falla, redirigir de regreso con un mensaje de error
            return back()->withErrors([
                'message' => 'Correo o contraseña incorrectos, intente de nuevo'
            ]);
        } else {
            // Si el inicio de sesión es exitoso
            if (auth()->user()->role == 'admin') {
                // Si el usuario tiene el rol de 'admin', redirigir a la ruta 'admin'
                return redirect()->route('admin');
            } else {
                // Si el usuario no tiene el rol de 'admin', redirigir a la ruta '/user'
                return redirect()->to('/user');
            }
        }
    }

    /**
     * Cierra la sesión del usuario.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy() {
        // Cerrar la sesión del usuario
        auth()->logout();

        // Redirigir a la ruta '/login' después de cerrar la sesión
        return redirect()->to('/login');
    }
}
