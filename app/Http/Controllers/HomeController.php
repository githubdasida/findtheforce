<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Petitions;
use App\Actor;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    protected $petitions;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Petitions $petitions)
    {
        $this->middleware('auth');
        $this->petitions = $petitions;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    
        $response = $this->petitions->getFilms();

        return view('home', compact('response'));
    }

    /*
     * Muestra la película individual con sus personajes.
     */
    public function show($id) {

        $film = $this->petitions->getFilm($id);
            
        $actors = $this->petitions->actorsOf($film);

        $favorites = $this->petitions->getFavorites($this->favoritesToAPI());

        $favoriteformat = $this->favoriteFormat($favorites);

        return view('film', compact('film', 'actors', 'favorites', 'favoriteformat'));
    }

    /*
     * Muestra el listado de favoritos del usuario.
     */
    public function favorites() {
        $actors = $this->petitions->getFavorites($this->favoritesToAPI());
        
        $favoriteformat = $this->favoriteFormat($actors);

        return view('favorites', compact('actors', 'favoriteformat'));
    }

    /*
     * Formatea los favoritos del usuario para la API.
     */
    public function favoritesToAPI() {
        $favorites_api = [];
        foreach(Auth::user()->favorites as $favorite) {
            array_push($favorites_api, $favorite->api_id);
        }

        return $favorites_api;
    }

    /*
     * Formatea los favoritos de la API para la vista.
     */
    public function favoriteFormat($favorites) {
        $favoriteformat = [];

        foreach($favorites as $favorite) {
            array_push($favoriteformat, $favorite['url']);
        }

        return $favoriteformat;
    }

    /*
     * Añade el actor a favorito.
     * 
     * Si el actor no existe lo crea y lo añade.
     * Si el actor está en favoritos, lo elimina de la lista de favoritos.
     */
    public function addFavorite($id) {
        if(empty(Actor::where('api_id', $id)->get()[0])) {
            $actor = new Actor;
            $actor->api_id = $id;
            $actor->save();

            Auth::user()->favorites()->attach($actor->id);
        } else {
            $actor = Actor::where('api_id', $id)->get()[0];
            if(in_array($actor->api_id, $this->favoritesToAPI())) {
                Auth::user()->favorites()->detach($actor->id);
            } else {
                Auth::user()->favorites()->attach($actor->id);
            }
        }
        return back();
    }
}
