@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')

<center>

{{-- Grid de una columna que almacena dos div, uno encima de otro --}}
<div class="grid grid-cols-1 divide-y w-1/3">

    {{-- Div 1 --}}
    <div class="items-center block mx-auto p-4 mt-10 w-30px w-full bg-indigo-500 text-white rounded-t-lg dark:bg-indigo-700">
        <p class="font-Leckerli text-4xl md:text-7xl my-4">Raulapp</p>
        <h1 class="font-Work text-2xl">Raulapp te ayuda a comunicarte y conocer a nuevas personas.</h1>
    </div>

    {{-- Div 2 --}}
    <div class="p-8 bg-white w-full rounded-b-lg dark:bg-gray-700 dark:border-indigo-700">
    
        <h1 class="text-3xl text-center font-bold dark:text-white"> Inicio de sesión </h1>

        <form class="mt-4" method="POST" action="">

            {{-- Token que implementa Laravel para cada usuario y obtener mayor seguridad --}}
            @csrf

            <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white 
            dark:bg-gray-500 dark:text-white dark:placeholder-white dark:border-indigo-700" placeholder="Email" id="email" name="email">


            {{-- Div con grid de una columna en el que tiene dos campos, el de la contraseña y el botón que ejecuta el script --}}
            <div class="grid grid-cols-6 grid-rows-1 gap-0">
                <div class="col-span-5 w-full">
                    <input type="password" class="border border-gray-200 rounded-l-lg bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white
                    dark:bg-gray-500 dark:text-white dark:placeholder-white dark:border-indigo-700" 
                    placeholder="Contraseña" id="password" name="password">
                </div>
                <div class="col-start-6">
                    <button class="border border-gray-200 rounded-r-lg bg-indigo-500 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-indigo-700 
                    dark:bg-indigo-700 dark:text-white dark:placeholder-white dark:border-indigo-700 dark:hover:bg-indigo-600" type="button" 
                    onclick="mostrarContrasena()">👀</button>
                </div>
            </div>


            {{-- Párrafo de error que sólo aparece cuando hay uno --}}
            @error('message')
                <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">
                    {{ $message }} <!-- Recibe el contenido de $message y lo muestra -->
                </p>
            @enderror

            <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-indigo-600 
            dark:bg-indigo-700 dark:text-white dark:placeholder-white dark:border border-indigo-700 dark:hover:bg-indigo-600">
                Enviar
            </button>
        </form>
    </div>
</div>

<center>

@endsection