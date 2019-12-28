<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

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

        return view('pelicula', compact('r'));
    }
}
