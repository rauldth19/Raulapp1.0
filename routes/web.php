<?php
use Illuminate\Support\Facades\Route;

//Añado la ruta de los controladores creados.
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Ruta raíz que nos pide autenticación para ingresar a home.
Route::get('/', 'App\Http\Controllers\HomeController@index', function () {
    return view('home'); //Nos dirige a la ruta de "home.blade.php" en views.
})->middleware('auth'); //Pidiendo la autenticación


//Ruta del registra y nos redirige a register.
Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest') //De esta manera, una vez ingresado en el usuario no nos dejaría volver al login.
    ->name('register.index'); //Nombre que se le da a la ruta.


//Ruta que nos registra, verifica campos e inserta en la base de datos.
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


//Ruta que nos loguea y redirige a login.
Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest') //De esta manera, una vez ingresado en el usuario no nos dejaría volver al login.
    ->name('login.index'); //Nombre que se le da a la ruta.


//Ruta que nos loguea, verifica campos y comprueba en la base de datos.
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');


//Ruta que cierra la sesión y destruye la misma.
Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth') //De esta manera, una vez ingresado en el usuario no nos dejaría volver al login.
    ->name('login.destroy'); //Nombre que se le da a la ruta.

    
//Este método crea automáticamente varias rutas para las operaciones CRUD (Create, Read, Update, Delete).
Route::resource('home','App\Http\Controllers\HomeController');

Route::resource('privado','App\Http\Controllers\PrivadoController');

Route::resource('miPrivado', 'App\Http\Controllers\Privado2Controller');

//Ruta que obtiene el id del mensaje a borrar y elimina la misma.
Route::get('delete/{id}','App\Http\Controllers\Privado2Controller@destroy');








