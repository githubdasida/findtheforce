<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $client = new Client([
            'base_uri' => 'https://swapi.co/api/',
            'timeout'  => 2.0,
        ]);
    
        $response = $client->request('GET', 'films');
    
        $r =  json_decode($response->getBody(), true);

        return view('home', compact('r'));
    }

    public function show($id) {

        $client = new Client([
            'base_uri' => 'https://swapi.co/api/',
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', "films/{$id}");    
        $r =  json_decode($response->getBody(), true);
            
        $actores =[];
        foreach($r['characters'] as $actor) {
            $ida = explode('/', $actor);
            $response2 = $client->request('GET', "people/{$ida[5]}");
            $p = json_decode($response2->getBody(), true);
            array_push($actores, $p);
        }

        $favoritos = Auth::user()->favoritos;

        return view('pelicula', compact('r', 'actores', 'favoritos'));
    }

    public function favoritos($id) {
        $user = Auth::user();
        $f = $user->favoritos;
        if(in_array($id, $f)){

        } else {
            array_push($f, $id);
        }

        return back(); 
    }
}
