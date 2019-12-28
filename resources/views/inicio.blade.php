@extends('default')

@section('title')
    Find the Force
@endsection

@section('contenido')
<section class="container d-flex flex-grow-1 justify-content-center align-items-center" id="contenido">
    <div class="row">
        <div class="col-md d-flex flex-column justify-content-center">
            <h1 class="glitch">Descubre <br>el universo</h1>
            <div class="botones d-flex">
                <a href="{{ route('login') }}" class="btn btn-outline-light">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light">Registro</a>
            </div>
        </div>
        <div class="col-md"></div>
    </div>
</section>
@endsection