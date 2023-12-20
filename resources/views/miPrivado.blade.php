@extends('layouts.app')

@section('title', 'Chat')

@section('content')


{{-- Div que muestra los mensajes privados almacenados en la base de datos --}}
    <div class="text-center flex flex-col block mx-auto my-8 p-4 bg-white w-2/3 lg:w-1/3 border border-gray-200 rounded-lg shadow-lg
    dark:bg-gray-700 dark:border-indigo-700">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">


                            {{-- Columna del h1 --}}
                            <div class="grid grid-cols-5 grid-rows-1 gap-0 my-8">
                                <div class="col-span-4"><h1 class="text-xl sm:text-3xl text-center font-bold dark:text-white">Mis mensajes privados<h1></div>
                                <div class="col-start-5">
                                    <a href="{{ url('/home') }}" class="rounded-full bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">✘</a>
                                </div>
                            </div>

                            <tr class="text-sm text-center sm:text-xl font-bold dark:text-indigo-500">
                                <td>Usuario</td>
                                <td>Mensaje</td>
                                <td>Hora</td>
                                <td></td>
                            </tr>

                        {{-- Muestra el usuario, el mensaje y la hora --}}
                        <tbody class="text-center divide-y divide-gray-200 dark:divide-gray-700">
                        
                            @foreach($datos as $dato)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-800 dark:text-gray-200">{{ $dato->emisor }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-xs sm:text-gray-800 dark:text-gray-200">{{ $dato->mensaje }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-xs sm:text-gray-800 dark:text-gray-200">{{ $dato->hora }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-xs sm:text-gray-800 dark:text-gray-200">        
                                        <a href="{{ url('delete/'.$dato->id) }}" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-2 sm:px-4 border border-red-500 hover:border-transparent rounded dark:text-white">Borrar
                                    </td>
                                </tr>
                            @endforeach    
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </div>

@endsection