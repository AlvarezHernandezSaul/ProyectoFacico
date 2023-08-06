<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class AdminController extends Controller
{
    public function admin()
    {
        $registro = Registro::all();

        return view('admin.home', compact('registro'));
    }
}
