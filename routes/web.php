<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

//Ruta Inicial.
Route::get('/', function() {
    if(Auth::user()){
       return redirect('/home');
    } else {
        return view('inicio');
    }
});

//Ruta por defecto de laravel.
Route::get('/welcome', function () {
    return view('welcome');
});

//Rutas de autenticación.
Auth::routes(['verify' => true]);


 //  Ruta Principal - Listado de películas.
Route::get('/home', 'HomeController@index')->middleware('verified');

 //  Ruta Películas - Muestra la película seleccionada con sus actores. 
Route::get('/film/{id}', 'HomeController@show')->middleware('verified');

 //  Ruta Añadir Actor a favoritos - Añade o elimina al actor de la lista de favoritos.  
Route::get('/actor/{id}/fav', 'HomeController@addFavorite')->middleware('verified');

 //  Ruta favoritos - Muestra el listado de favoritos del usuario, requiere confirmación de contraseña. 
Route::get('/favorites', 'HomeController@favorites')->middleware('verified')->middleware('password.confirm');