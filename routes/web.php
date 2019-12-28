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
use GuzzleHttp\Client;

Route::get('/', function() {
    if(Auth::user()){
       return redirect('/home');
    } else {
        return view('inicio');
    }
});

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('password.confirm');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::get('/test', function() {
    $client = new Client([
        'base_uri' => 'https://swapi.co/api',
        'timeout'  => 2.0,
    ]);

    $response = $client->request('GET', 'films');

    dd($response);
}); 