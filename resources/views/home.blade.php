@extends('layouts.app')

@section('title', 'Chat')

@section('content')

    {{-- Establece la hora de España --}}
    <?php
        date_default_timezone_set('Europe/Madrid');
    ?>

    <!-- Div que muestra un formulario para el envío del mensaje a la base de datos -->
    <div class="block mx-auto my-8 p-4 bg-white w-2/3 lg:w-1/3 border border-gray-200 rounded-lg shadow-lg 
    dark:bg-gray-700 dark:border-indigo-700">     

        <form class="mt-4" method="POST" action="{{ url('home') }}">
         
            {{-- Token de seguridad --}}
            @csrf

            {{-- Textarea que envía el texto del mensaje a la base de datos --}}
            <h3 class="text-2xl text-center font-bold dark:text-white"> Tu mensaje </h3>
            <br>
            <textarea name="mensaje" rows="1" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg 
            border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 
            dark:bg-gray-500 dark:text-white dark:placeholder-white dark:border-indigo-700" placeholder="Escribe tu mensaje aqui..."  maxlength="200" 
            require></textarea>

            {{-- Textarea invisible que envía el nombre del usuario a la base de datos --}}
            <textarea name="usuario" readonly="readonly" hidden>{{ auth()->user()->name }}</textarea>

            {{-- Textarea invisible que envía la hora a la base de datos --}}
            <textarea name="hora" readonly="readonly" hidden>{{ date("h:i") }}</textarea>

            <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-indigo-600
            dark:bg-indigo-700 dark:text-white dark:placeholder-white dark:border-indigo-700 dark:hover:bg-indigo-600">
                Enviar
            </button>

            {{-- Párrafo de error que sólo aparece cuando hay un error en el name--}}
            @error('mensaje')
                <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">
                    {{ $message }}
                </p>
            @enderror
        </form>
    </div>

    {{-- Div que muestra los mensajes almacenados en la base de datos --}}
    <div class="flex flex-col block mx-auto my-8 p-4 bg-white w-2/3 lg:w-1/3 border border-gray-200 rounded-lg shadow-lg
    dark:bg-gray-700 dark:border-indigo-700">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">

                        {{-- Div con grid de dos columnas --}}
                        <div class="grid grid-cols-2 grid-rows-1 gap-0">

                            {{-- Columna del h1 --}}
                            <div class="w-full text-center my-3">
                                <h1 class="text-3xl text-center font-bold dark:text-white"> Chat común</h1>
                            </div>

                            {{-- Columna que actualiza el chat --}}
                            <div class="w-full text-center my-5">
                                <a href="{{ route('home.index') }}" class="rounded-md bg-indigo-500 w-1/3 text-sm text-white font-semibold p-2 my-3 hover:bg-indigo-600
                                dark:bg-indigo-700 dark:text-white dark:placeholder-white dark:border-indigo-700 dark:hover:bg-indigo-600">Actualizar chat</a>
                            </div>
                        </div>

                        {{-- Muestra los usuarios, el mensaje y la hora --}}
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        
                            @foreach($mensajes as $mensaje)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $mensaje->Usuario }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $mensaje->Mensaje }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $mensaje->Hora }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"></td>
                                </tr>
                            @endforeach       
                        </tbody>
                    </table>                    
            </div>
        </div>
    </div>
@endsection

