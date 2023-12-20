<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller
{
    
    public function create(){

        //Nos redirige a "login.blade.php".
        return view('auth.login');
    }

    public function store(){

        //En caso de que no coincidan el email y la contraseña nos mostrará un mensaje.
        if(auth()->attempt(request(['email', 'password'])) == false){

            return back()->withErrors([
                'message' => 'El email o la contraseña son incorrectos'
            ]);

        }

        //Nos redigige a la raiz.
        return redirect()->to('/');       
    }

    public function destroy(){

        //Nos destruye la sesión.
        auth()->logout();

        //Nos redirige a la raíz.
        return redirect()->to('/'); 
    }
}
