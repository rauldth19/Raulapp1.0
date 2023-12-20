@extends('layouts.app')

@section('title', 'Chat')

@section('content')

{{-- Establece la hora de España --}}
    <?php
        date_default_timezone_set('Europe/Madrid');
    ?>

<form class="mt-4" method="POST" action="{{ url('privado') }}">
         
    {{-- Token de seguridad --}}
    @csrf

    {{-- Textarea invisible que envía el nombre del usuario a la base de datos --}}
    <textarea name="emisor" readonly="readonly" hidden>{{ auth()->user()->name }}</textarea>

    {{-- Textarea invisible que envía la hora a la base de datos --}}
    <textarea name="hora" readonly="readonly" hidden>{{ date("h:i") }}</textarea>

    {{-- Div que muestra los mensajes almacenados en la base de datos --}}
    <div class="w-2/3 flex flex-col block mx-auto my-8 p-3 md:p-4 bg-white lg:w-1/3 border border-gray-200 rounded-lg shadow-lg
    dark:bg-gray-700 dark:border-indigo-700">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">             

                        {{-- Columna del h1 --}}
                            <div class="grid grid-cols-5 grid-rows-1 gap-0 my-8">
                                <div class="col-span-4"><h1 class="text-3xl text-center font-bold dark:text-white">Chat privado<h1></div>
                                <div class="col-start-5">
                                    <a href="{{ url('/home') }}" class="rounded-full bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">✘</a>
                                </div>
                            </div>
                        <br>

                        {{-- Muestra todos los usuarios del sistema para elegir a quien se le envia el mensaje privado --}}
                        <div class="w-full text-center my-3">  
                            <label for="receptor" class="text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione usuario</label>               
                            <select name="receptor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($usuarios as $usuario)
                                    <option value="{{$usuario['name']}}">{{ $usuario->name}}</option>
                                @endforeach 
                            </select> 
                            <br>

                            <textarea name="mensaje" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg 
                            border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 
                            dark:bg-gray-500 dark:text-white dark:placeholder-white dark:border-indigo-700" placeholder="Escribe tu mensaje aqui..."  maxlength="200" 
                            require></textarea>

                            <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-indigo-600
                            dark:bg-indigo-700 dark:text-white dark:placeholder-white dark:border-indigo-700 dark:hover:bg-indigo-600">
                                Enviar
                            </button>

                            {{-- Recibe el contenido de $mensaje y lo muestra --}}
                            @if ($mensaje = Session::get('success'))
                                <p class="text-center border border-green-500 rounded-md bg-green-100 w-full text-green-600 p-2 my-2">
                                    {{ $mensaje }} 
                                </p>
                            @endif  

                            {{-- Párrafo de error que sólo aparece cuando hay un error en el name--}}
                            @error('mensaje')
                                <p class="text-center border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>
                    </table>                 
                </div>
            </div>
        </div>
    </div>
</form>

@endsection