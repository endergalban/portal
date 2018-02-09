<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>
    <body>
    
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ route('publicar.index') }}">Publicar</a>
                    @auth
                    <a href="{{ route('publicar.asistencia') }}">Venta Asistida</a>
                    <li><a href="{{ route('miscompras') }}">Mis compras</a></li>
                    <li><a href="{{ route('misventas') }}">Mis ventas</a></li>

                     @if(Auth::user()->tipo == 1)
                       
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            Configuración <span class="caret"></span>
                        </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                                <li><a href="{{ route('productos.index') }}">Productos</a></li>
                                <li><a href="{{ route('atributos.index') }}">Caracteristicas</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            Publicaciones <span class="caret"></span>
                        </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Publicaciones de Usuarios</a></li>
                                <li><a href="{{ route('admin.asistencias.index')}}">Ventas Asistidas</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('users.edit', Auth::user()->id) }}"
                                   >
                                    Edit
                                </a>

                                <form id="edit-form" action="{{ route('users.edit', Auth::user()->id ) }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif

            <div class="content">

                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="{{ route('publicaciones.index') }}">Publicaciones</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                <form method="get" action="{{ route('publicaciones.index')}}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default-sm" type="submit">
                                    <i class="fa fa-search"> Buscar
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

    </body>
</html>
