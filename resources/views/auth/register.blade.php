@extends('layouts.app')

@section('title', 'Registrarse')

@section('content')

<center>

{{-- Grid de una columna que almacena dos div, uno encima de otro --}}
<div class="grid grid-cols-1 divide-y w-1/3">

    {{-- Div 1 --}}
    <div class="items-center block mx-auto p-4 mt-10 w-30px w-full bg-indigo-500 text-white rounded-t-lg dark:bg-indigo-700">
        <p class="font-Leckerli  text-4xl md:text-7xl my-4">Raulapp</p>
        <h1 class="font-Work text-2xl">Raulapp te ayuda a comunicarte y conocer a nuevas personas.</h1>
    </div>

    {{-- Div 2 --}}
    <div class="block mx-auto p-8 bg-white w-full rounded-b-lg mb-10 dark:bg-gray-700 dark:border-indigo-700">
    
    <h1 class="text-3xl text-center font-bold dark:text-white"> Registro </h1>

    <form class="mt-4" method="POST" action="">

        {{-- Token que implementa Laravel para cada usuario y obtener mayor seguridad --}}
        @csrf

        <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white
        dark:bg-gray-500 dark:text-white dark:placeholder-white dark:border-indigo-700" 
        placeholder="Nombre" id="name" name="name" maxlength="30">

        {{-- Párrafo de error que sólo aparece cuando hay un error en el name --}}
        @error('name')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">
                {{ $message }}
            </p>
        @enderror

        <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white
        dark:bg-gray-500 dark:text-white dark:placeholder-white dark:border-indigo-700" 
        placeholder="Email" id="email" name="email">

        {{-- Párrafo de error que sólo aparece cuando hay un error en el email --}}
        @error('email')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">
                {{ $message }}
            </p>
        @enderror

        <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white
        dark:bg-gray-500 dark:text-white dark:placeholder-white dark:border-indigo-700" 
        placeholder="Contraseña" id="password" name="password">

        {{-- Párrafo de error que sólo aparece cuando hay un error en el name --}}
        @error('password')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">
                {{ $message }}
            </p>
        @enderror

        <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white
        dark:bg-gray-500 dark:text-white dark:placeholder-white dark:border-indigo-700" 
        placeholder="Confirmar contraseña" id="password_confirmation" name="password_confirmation">

        <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-indigo-600
        dark:bg-indigo-700 dark:text-white dark:placeholder-white dark:border-indigo-700 dark:hover:bg-indigo-600">
            Enviar
        </button>
    </form>

</div>


@endsection