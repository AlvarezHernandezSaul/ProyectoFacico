<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Muestra el formulario de registro.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        // Mostrar la vista "auth.register" para el formulario de registro
        return view('auth.register');
    }

    /**
     * Almacena un nuevo usuario en la base de datos.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        // Validar los campos del formulario de registro
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'nullable',
            'password' => 'required|confirmed',
        ]);

        // Crear un nuevo usuario utilizando los campos proporcionados en el formulario
        $user = User::create(request(['name', 'email', 'password'])); 

        // Iniciar sesión para el usuario recién registrado
        auth()->login($user);

        // Redirigir al usuario a la ruta '/user' después de registrarse
        return redirect()->to('/user');
    }
}
