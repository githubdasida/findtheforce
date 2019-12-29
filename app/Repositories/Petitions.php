<?php

namespace App\Repositories;

use GuzzleHttp\Client;

class Petitions {

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /*
     * Función get().
     * 
     * Realiza las peticiones de tipo GET a la API.
     * 
     * Recibe como parámetro la url donde se va a realizar la petición.
     */
    public function get($url) {
        $response = $this->client->request('GET', $url);
    
        return json_decode($response->getBody(), true);
    }

    /*
     * Función getFilms().
     * 
     * Devuelve un array con el listado de todas las películas.
     */
    public function getFilms() {    
        return $this->get('films');
    }

    /*
     * Función getFilm().
     * 
     * Devuelve un array con el contenido de la película seleccionada.
     */
    public function getFilm($id) {
        return $this->get("films/{$id}");
    }

    /*
     * Función getActor().
     * 
     * Devuelve un array con el contenido del actor seleccionada.
     */
    public function getActor($id) {
        return $this->get("people/{$id}");
    }

    /*
     * Función actorsOf().
     * 
     * Devuelve un array con la información de todos los actores participantes
     * en la película seleccionada.
     * 
     * Recibe como parámetro una película (No el ID).
     */
    public function actorsOf($film) {
        $actors = [];

        foreach($film['characters'] as $actor) {
            $id_actor = explode('/', $actor);
            $actor = $this->getActor($id_actor[5]);
            array_push($actors, $actor);
        }

        return $actors;
    }

    /*
     * Función getFavorites().
     * 
     * Devuelve la información de todos los actores marcados como favoritos.
     */
    public function getFavorites($favorites) {
        $newFavorites = [];

        foreach($favorites as $favorite) {
            $actor = $this->getActor($favorite);
            array_push($newFavorites, $actor); 
        }

        return $newFavorites;
    }
}