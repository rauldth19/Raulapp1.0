<?php

namespace App\Http\Controllers;

use App\Models\privado;
use Illuminate\Http\Request;
use App\Models\User;

class PrivadoController extends Controller
{
    public function index()
    {
        //Función que muestra todos los usuarios de la base de datos ordenador por "id".
        $usuarios = User::orderBy('id')
        ->get();

        return view('privado')->with('usuarios',$usuarios);
        
    }


    public function create()
    {
        //Nos redirige a home
        return view('privado');
    }


    //Función que envía a la base de datos los datos necesarios de el mensaje privado.
    public function store(Request $request)
    {
        //Comprueba que se ha introducido un mensaje, de lo contrario informa que es requerido.
        $this->validate(request(),[
            'mensaje' => 'required'
        ]);

        $mensaje = new Privado();
        $mensaje->emisor = $request->post('emisor'); 
        $mensaje->receptor = $request->post('receptor'); 
        $mensaje->mensaje = $request->post('mensaje'); 
        $mensaje->hora = $request->post('hora'); 

        $mensaje->save();

        //Nos redirige a "privado" con el mensaje de que se ha enviado con éxito.
        return redirect()->to('privado')->with("success", "Mensaje enviado con éxito");

    }
}
