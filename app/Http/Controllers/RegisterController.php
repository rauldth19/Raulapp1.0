<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Se incluye el modelo de usuario.
use App\Models\User;

class RegisterController extends Controller
{
    
    public function create(){

        //Nos redirige a register.blade.php
        return view('auth.register');
    }


    public function store(){

        //Valida que los campos estén rellenados
        $this->validate(request(),[
               'name' => 'required',
               'email' => 'required|email',
               'password' => 'required|confirmed',
        ]);

        //Enviamos esos datos a la tabla "User" y lo almacenamos en la variable $user.
        $user = User::create(request(['name', 'email', 'password']));

        //Autentifica el usuario
        auth()->login($user);

        //Nos redirige a la raíz
        return redirect()->to('/');
    }
}
