@extends('default')

@section('title')
    {{$r['title']}} | Find the Force
@endsection

@section('contenido')
<section class="container d-flex flex-grow-1 justify-content-center align-items-center" id="contenido">
    <div class="row">
        <div class="col-md d-flex flex-column justify-content-center">
            <h1 class="glitch">Find<br>the Force</h1>
            <div class="botones d-flex">
                <a href="{{ route('register') }}" class="btn btn-outline-light ml-0">Personajes Favoritos</a>
            </div>
        </div>
        <div class="col-md">
            <div class="card card-long">
                <div class="card-body">
                    <h2>{{$r['title']}}</h2>
                    <p>{{$r['opening_crawl']}}</p>
                    <h5>Actores</h5>
                    <ul>
                        @foreach ($actores as $actor)
                            @php
                                $url = explode('/', $actor['url']);
                            @endphp
                            <li>
                                    {{$actor['name']}}
                                    @if (in_array($url[5], $favoritos))
                                        <a href="/actor/{{$url['5']}}/fav"><i class="fas fa-heart"></i></a></li>
                                    @else
                                        <a href="/actor/{{$url['5']}}/fav"><i class="far fa-heart"></i></a></li>
                                    @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection