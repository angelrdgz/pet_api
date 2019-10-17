<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Pet Walk</title>
</head>

<body id="site-layout">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav">
                    @auth
                    <li>
                        <a href="{{ url('/home') }}">{{Auth::user()->name}}</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrate</a>
                    </li>
                    @endif
                    @endauth
                </ul>
            </form>
        </div>
    </nav>
    @yield('content')
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h1>LOGO</h1>
                </div>
                <div class="col-sm-3">
                    <p><b>Sitio</b></p>
                    <ul>
                        <li><a href="">Inicio</a></li>
                        <li><a href="">Servicios</a></li>
                        <li><a href="">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <p><b>Nosotros</b></p>
                    <ul>
                        <li><a href="">Terminos y condiciones</a></li>
                        <li><a href="">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="fab fa-facebook-f footer-icon"></i>
                        </div>
                        <div class="col-sm-4">
                            <i class="fab fa-twitter footer-icon"></i>
                        </div>
                        <div class="col-sm-4">
                            <i class="fab fa-instagram footer-icon"></i>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="" class="btn btn-block btn-primary btn-rounded">Contactanos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" />
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>