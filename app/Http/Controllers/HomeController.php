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

        $client = new Client([
            'base_uri' => 'https://swapi.co/api/',
            'timeout'  => 2.0,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    
        $response = $client->request('GET', 'films');
    
        $r =  json_decode($response->getBody(), true);

        return view('home', compact('r'));
    }

    public function show($id) {

        $response = $client->request('GET', "films/{$id}");
    
        $r =  json_decode($response->getBody(), true);

        return view('pelicula', compact($r));
    }
}
