<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Mensajes;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {

        //Almacena en $datos un array de Mensajes ordenado por id en orden descendiente.
        $datos['mensajes']=Mensajes::orderBy('id', 'DESC')
        ->take(10) //Coge los 10 últimos
        ->get();

        //Envia $datos a home.
        return view('home',$datos); 
    }


    public function create()
    {
        //Nos redirige a home
        return view('home');
    }


    public function store(Request $request)
    {

        //Comprueba que se ha introducido un mensaje, de lo contrario informa que es requerido.
        $this->validate(request(),[
            'mensaje' => 'required'
        ]);

        //Almacena todos los datos excepto el token en $mensaje.
        $mensaje=request()->except('_token');

        //Inserta en la tabla mensajes esos datos.
        Mensajes::insert($mensaje);

        //Nos redirige a home.
        return redirect()->to('home');
    }
}
