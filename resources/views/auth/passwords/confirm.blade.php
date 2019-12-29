@extends('default')

@section('title')
    Password confirmation | Find the Force
@endsection

@section('contenido')
<section class="container d-flex flex-grow-1 justify-content-center align-items-center" id="contenido">
    <div class="row">
        <div class="col-md d-flex flex-column justify-content-center">
            <h1 class="glitch">Access<br>Dark Side</h1>
        </div>
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <strong class="mb-5">{{ __('Please confirm your password before continuing.') }}</strong>

                    <form method="POST" class="mt-3" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row d-flex flex-column">
                            <label for="password" class="col col-form-label">{{ __('Password') }}</label>

                            <div class="col">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection