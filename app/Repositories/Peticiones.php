<?php

namespace App\Repositories;

use GuzzleHttp\Client;

class Peticiones {

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get($url) {
        $response = $this->client->request('GET', $url);
    
        return json_decode($response->getBody(), true);
    }

    public function peliculas() {    
        return $this->get('films');
    }

    public function pelicula($id) {
        return $this->get("films/{$id}");
    }

    public function actor($id) {
        return $this->get("people/{$id}");
    }

    public function actoresDe($pelicula) {
        $actores = [];

        foreach($pelicula['characters'] as $actor) {
            $ida = explode('/', $actor);
            $actor = $this->actor($ida[5]);
            array_push($actores, $actor);
        }

        return $actores;
    }

    public function favoritos($favoritos) {
        $favoritos = [];

        foreach($favoritos as $favorito) {
            $actor = $this->actor($favorito);
            array_push($actores, $actor); 
        }

        return $favoritos;
    }
}