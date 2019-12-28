@extends('layouts.base')

@section('cabecera')
    <div class="row">
        <div class="col">
            <a href="/"><img src="/images/logo.png" alt="find the force logo" class="logo"></a>
        </div>
        <div class="col d-flex justify-content-end align-items-center">
            @auth
            <nav class="navbar navbar-expand-lg pt-4">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        </li>
                    </ul>
                </div>
            </nav>
            @endauth
        </div>
    </div>
@endsection

@section('footer')
    <div class="row">
        <div class="col-md">
            <p><span id="copyleft">©</span> 2019 Holasoychema.com</p>
        </div>
        <div class="col-md">
            <ul class="d-flex flex-row-reverse">
                <li><a target="_blank" rel="nofollow" href="https://github.com/githubdasida/findtheforce"><i class="fab fa-github"></i>&nbsp; Github</a></li>
                <li><a target="_blank" rel="nofollow" href="https://www.holasoychema.com"><i class="fab fa-linkedin"></i>&nbsp; Linkedin</a></li>
            </ul>
        </div>
    </div>
@endsection