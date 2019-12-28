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
                        @foreach ($r['characters'] as $actor)
                            <li><a href="/actor/"><i class="far fa-heart"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection