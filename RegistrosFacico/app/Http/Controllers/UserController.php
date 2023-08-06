<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class UserController extends Controller
{
    public function user()
    {
        $registro = Registro::all();

        return view('user.user', compact('registro'));
    }
}
