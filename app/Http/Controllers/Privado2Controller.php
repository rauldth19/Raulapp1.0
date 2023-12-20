<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\privado;

class Privado2Controller extends Controller
{
    //Función que muestra todos los usuarios de la base de datos
    public function index()
    {
        $nombre=auth()->user()->name;

        $datos = privado::orderBy('id', 'DESC')
        ->where('receptor', '=', $nombre)
        ->get();

        //Envia $datos a miPrivado.
        return view('miPrivado')->with('datos',$datos);
        
    }


    public function create()
    {
        //Nos redirige a miPrivado
        return view('miPrivado');
    }


    //Función que elimina (por id) el mensaje privado.
    public function destroy($id)
    {
        $tabla = privado::find($id);
        $tabla->delete();

        //Redirige a "miPrivado".
        return redirect('miPrivado');
    }
    
}
