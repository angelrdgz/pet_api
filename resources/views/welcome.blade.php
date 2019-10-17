<!--<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>-->

@extends('layouts.site')

@section('content')
<div class="home-first">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1" d="M0,160L1440,288L1440,320L0,320Z"></path>
    </svg>
</div>
<div class="home-second">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-center">Conciente a tu mascota</h2>
            </div>
        </div>
        <br>
        <div class="row d-md-flex align-items-center h-100 justify-content-center">
            <div class="col-sm-7">
                <h4 class="text-center">Servicios de Paseo</h4>
                <br>
                <p>
                    <div class="row  d-md-flex align-items-center h-100 justify-content-center">
                        <div class="col-sm-2 text-center">
                            <i class="fas fa-paw icon-description"></i>
                        </div>
                        <div class="col-sm-10">
                            <h6><b>Paseo de tu mascota</b></h6>
                            <p>Tu mascota debe de pasear de 2 a 3 veces por semana para evitar su estres.</p>
                        </div>
                    </div>
                </p>
                <p>
                    <div class="row  d-md-flex align-items-center h-100 justify-content-center">
                        <div class="col-sm-2 text-center">
                            <i class="fas fa-dog icon-description"></i>
                        </div>
                        <div class="col-sm-10">
                            <h6><b>Paseo de tu mascota</b></h6>
                            <p>Tu mascota debe de pasear de 2 a 3 veces por semana para evitar su estres.</p>
                        </div>
                    </div>
                </p>
            </div>
            <div class="col-sm-5">
                <img src="{{asset('imgs/perro.png')}}" class="ilustration" alt="">
            </div>
        </div>
        <br>
        <div class="row d-md-flex align-items-center h-100 justify-content-center">
            <div class="col-sm-5">
                <img src="{{asset('imgs/perro.png')}}" class="ilustration" alt="">
            </div>
            <div class="col-sm-7">
                <h4 class="text-center">Hotel para tu mascota</h4>
                <br>
                <p>
                    <div class="row  d-md-flex align-items-center h-100 justify-content-center">
                        <div class="col-sm-2 text-center">
                            <i class="far fa-moon icon-description"></i>
                        </div>
                        <div class="col-sm-10">
                            <h6><b>Paseo de tu mascota</b></h6>
                            <p>Tu mascota debe de pasear de 2 a 3 veces por semana para evitar su estres.</p>
                        </div>
                    </div>
                </p>
                <p>
                    <div class="row  d-md-flex align-items-center h-100 justify-content-center">
                        <div class="col-sm-2 text-center">
                            <i class="fas fa-bone icon-description"></i>
                        </div>
                        <div class="col-sm-10">
                            <h6><b>Paseo de tu mascota</b></h6>
                            <p>Tu mascota debe de pasear de 2 a 3 veces por semana para evitar su estres.</p>
                        </div>
                    </div>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="home-third">
    <svg class="up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1" d="M0,32L1440,160L1440,0L0,0Z"></path>
    </svg>
    <svg class="down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1" d="M0,192L1440,288L1440,320L0,320Z"></path>
    </svg>
</div>
<div class="home-fourth">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">A</div>
            <div class="col-sm-4">
                <img src="{{ asset('imgs/phone.png') }}" alt="">
            </div>
            <div class="col-sm-4">C</div>
        </div>
    </div>
</div>
@endsection