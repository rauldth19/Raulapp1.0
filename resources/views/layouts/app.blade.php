<!DOCTYPE html>
<html lang="en" id="tema" class="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Incluye "app.css" y "app.js" -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">

    {{-- Icono de nuestra Raulapp --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('android-chrome-192x192.png') }}">

    {{-- Se establecerá el titulo seguido de "- Raulapp" --}}
    <title>@yield('title') - Raulapp</title>

    {{-- Agrega una fuente de google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&display=swap" rel="stylesheet">

    {{-- Otra fuente de google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">

  </head>

  {{-- Color del fondo | Color del fondo modo oscuro --}}
  <body class="bg-gradient-to-r from-gray-400 to-blue-300
  dark:bg-gradient-to-r dark:from-gray-800 dark:to-indigo-900">
  
  {{-- Menú de la aplicación constituido por un grid de dos columnas --}}
    <div class="grid grid-cols-7 grid-rows-1 md:grid md:grid-cols-2 md:grid-rows-1 md:w-full bg-indigo-500 text-white dark:bg-gray-700">
        <div class="col-span-2 md:w-full">
          <ul class="ml-auto flex justify-start my-5">
          
            {{-- Si el usuario está logueado mostrará un enlace en el logo y un saludo personalizado --}}
            @if(auth()->check())
              <li>
                <a title="Inicio" href="http://localhost/Apps/Raulapp1.0/public/home"><img class="w-8 mx-2 lg:w-8 lg:mx-10" src="{{URL::asset('icono.png')}}"></a>
              </li>
              <li>
                  <p class="text-sm mx-7 lg:text-xl md:mx-1">Bienvenido <b>{{ auth()->user()->name }}</b></p>
              </li>
              
            {{-- Si el usuario NO está logueado mostrará solamente el logo pero sin enlace --}}
            @else
              <li>
                <a title="Inicio"><img class="w-8 mx-2 lg:w-8 lg:mx-10" src="{{URL::asset('icono.png')}}"></a>
              </li>
            @endif
          </ul>
        </div>

        <div class="col-span-5 col-start-3 md:w-full">
          <ul class="w-2/2 px-1 ml-auto flex justify-end my-6">
          
            {{-- Si el usuario está logueado mostrará las siguientes funcionalidades --}}
            @if(auth()->check())
              <li>
                  <a href="{{ url('/privado') }}" class="text-xs px-2 md:text-sm font-semibold hover:bg-indigo-700 py-2 md:px-6 rounded-md 
                  dark:hover:border-2 dark:hover:border-indigo-600 dark:hover:bg-gray-700">Enviar mensaje privado</a>
              </li>

              <li>
                  <a href="{{ url('/miPrivado') }}" class="text-xs px-2 md:text-sm font-semibold hover:bg-indigo-700 py-2 md:px-6 rounded-md 
                  dark:hover:border-2 dark:hover:border-indigo-600 dark:hover:bg-gray-700">Mis mensajes</a>
              </li>
              <li>
                  <a href="{{ route('login.destroy') }}" class="text-xs px-2 md:text-sm font-bold py-2 md:px-4 md:mx-3 rounded-md bg-gray-700 hover:bg-gray-800
                  dark:bg-indigo-700 dark:focus:bg-indigo-600 dark:hover:bg-indigo-600 dark:hover:text-white dark:border-indigo-600">Cerrar sesión</a>
              </li>

            <!-- Si el usuario NO está logueado mostrará las opciones de iniciar sesión y registrarse -->
            @else
              <li class="mx-6">
                  <a href="{{ route('login.index') }}" class="font-semibold hover:bg-indigo-700 py-3 px-4 rounded-md 
                  dark:bg-gray-700 dark:focus:bg-gray-700 dark:hover:bg-indigo-600">Iniciar Sesión</a>
              </li>
              <li>
                  <a href="{{ route('register.index') }}" class="border-2 border-white py-2 px-4 rounded-md hover:bg-white hover:text-indigo-700 
                  dark:bg-gray-700 dark:focus:bg-indigo-600 dark:hover:bg-indigo-600 dark:hover:text-white dark:border-indigo-600">Registrarse</a>
              </li>
              @endif

              {{-- Muestra siempre el botón para establecer el modo oscuro --}}
              <li>
                <label class=" mx-5 relative inline-flex items-center cursor-pointer">
                  <input type="checkbox" class="sr-only peer" id="botonOscuro" onclick="javascript:CambiarEstilo();">
                  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer 
                  dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                  <span class="ml-3 text-sm font-medium text-white dark:text-gray-300" checked>Modo oscuro</span>
                </label>
              </li>
          </ul>
        </div>
    </div>

    {{-- Aquí irá el contenido --}}
    @yield('content')

    {{-- Se incluye la ruta del documento donde almacenamos los scripts --}}
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

    {{-- Modo invierno --}}
    <script defer src="https://app.embed.im/snow.js"></script>
    
  
  </body>
</html>