<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Peticiones;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    protected $peticiones;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Peticiones $peticiones)
    {
        $this->middleware('auth');
        $this->peticiones = $peticiones;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    
        $r = $this->peticiones->peliculas();

        return view('home', compact('r'));
    }

    public function show($id) {

        $pelicula = $this->peticiones->pelicula($id);
            
        $actores = $this->peticiones->actoresDe($pelicula);

        $favoritos = $this->peticiones->favoritos($this->getFavoritos());

        return view('pelicula', compact('r', 'actores', 'favoritos'));
    }

    public function getFavoritos() {
        $f = [];
        foreach(Auth::user()->favoritos as $favorito) {
            array_push($f, $favorito->api_id);
        }

        return $f;
    }
}
