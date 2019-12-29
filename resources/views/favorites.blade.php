@extends('default')

@section('title')
    Favorites | Find the Force
@endsection

@section('contenido')
<section class="container d-flex flex-grow-1 justify-content-center align-items-center" id="contenido">
    <div class="row">
        <div class="col-md d-flex flex-column justify-content-center">
            <h1 class="glitch">Find<br>the Force</h1>
            <div class="botones d-flex">
                <a href="/" class="btn btn-outline-light ml-0">Films</a>
            </div>
        </div>
        <div class="col-md">
            <div class="card card-long">
                <div class="card-body">
                    <h2>Favorites</h2>
                    <ul>
                        @foreach ($actors as $actor)
                            @php
                                $url = explode('/', $actor['url']);
                            @endphp
                            <li>
                                    {{$actor['name']}}
                                    @if (in_array($actor['url'], $favoriteformat))
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