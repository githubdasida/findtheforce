@extends('layouts.base')

@section('cabecera')
    <a href="/"><img src="/images/logo.png" alt="find the force logo" class="logo"></a>
@endsection

@section('contenido')
    @yield('contenido')
@endsection

@section('footer')
    <div class="row">
        <div class="col-md">
            <p><span id="copyleft">©</span> 2019 Holasoychema.com</p>
        </div>
        <div class="col-md">
            <ul class="d-flex flex-row-reverse">
                <li><a target="_blank" rel="nofollow" href="https://github.com/githubdasida/findtheforce"><i class="fab fa-github"></i>&nbsp; Github</a></li>
                <li><a target="_blank" rel="nofollow" href="https://www.instagram.com/_aryxbox_/"><i class="fab fa-instagram"></i>&nbsp; Instagram</a></li>
            </ul>
        </div>
    </div>
@endsection