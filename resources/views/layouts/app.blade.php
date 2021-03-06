<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/publicaciones.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <!-- Iconos -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>

    <script type="text/javascript">
      var urlActual = "{{ URL::current() }}";
      var APP_URL = "{{ env('APP_URL') }}";
    </script>
</head>
<body>
  <div class="ventanaOverlay hide" id="ventanaOverlay">
      <!-- Spinner -->vxvx
      <div id="spinnerCargando" class="sk-cube-grid">
          <div class="sk-cube sk-cube1"></div>
          <div class="sk-cube sk-cube2"></div>
          <div class="sk-cube sk-cube3"></div>
          <div class="sk-cube sk-cube4"></div>
          <div class="sk-cube sk-cube5"></div>
          <div class="sk-cube sk-cube6"></div>
          <div class="sk-cube sk-cube7"></div>
          <div class="sk-cube sk-cube8"></div>
          <div class="sk-cube sk-cube9"></div>
      </div>
  </div>
    <div id="app" style="overflow-x:hidden;min-height:500px;">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container" style="padding-bottom:0 !important">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/home/logo.png') }}">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right"  style="">
                        <!-- Authentication Links -->
                        <li><a href="{{ route('publicar.index') }}">Publicar</a></li>
                        <li><a href="{{ route('contacto') }}">Contacto</a></li>
                        <li><a href="{{ route('servicios') }}">Servicios</a></li>
                        @guest
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 10px;">
                                <img src="{{ asset('images/home/user-azul.png') }}">
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item link_block" href="{{ route('login') }}" style="font-size: 12px !important;">ENTRAR</a>
                              <a class="dropdown-item link_block" href="{{ route('register') }}" style="font-size: 12px !important;">REGISTRARME</a>
                              </div>
                            </li>
                        @else

                            {{-- <li><a href="{{ route('publicar.asistencia') }}">Venta Asistida</a></li> --}}
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
                                        <li><a href="{{ route('publicaciones.index')}}">Publicaciones</a></li>
                                        {{-- <li><a href="{{ route('admin.asistencias.index')}}">Ventas Asistidas</a></li> --}}
                                    </ul>
                                </li>
                            @endif

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" style="text-transform: capitalize;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('misventas') }}" class="dropdown-item link_block" href="" style="font-size: 12px !important;">
                                            Mensajes <span class="badge badge-pill badge-dark">{{Auth::user()->comentarios()->count()}}</span>
                                        </a>
                                    </li>
                                     <li>
                                        <a href="{{ route('mispublicaciones') }}" class="dropdown-item link_block" href="" style="font-size: 12px !important;">
                                            Publicaciones <span class="badge badge-pill badge-dark">{{Auth::user()->publicaciones()->count()}}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('mispublicaciones') }}" class="dropdown-item link_block" href="" style="font-size: 12px !important;">
                                            Inventario <span class="badge badge-pill badge-dark">{{Auth::user()->asistencias()->count()}}</span>
                                        </a>
                                    </li>
                                    <li><div class="dropdown-divider"></div></li>
                                    <li>
                                        <a  class="dropdown-item link_block" href="{{ route('users.edit', Auth::user()->id) }}"  style="font-size: 12px !important;" >
                                            Editar
                                        </a>

                                        <form id="edit-form" action="{{ route('users.edit', Auth::user()->id ) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a  class="dropdown-item link_block" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  style="font-size: 12px !important;">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

    </div>


    <div class="footer">
      <div class="row" style="margin-left: 0;margin-right: 0;">
          <div class="col-12">
              <img src="{{ asset('images/home/publicidad.jpg') }}" style="width:100%">
          </div>
      </div>
        <div class="row" style="margin-left: 0;margin-right: 0;">
            <div class="col-md-1 col-xs-1"></div>
            <div class="col-md-6 col-xs-12">
                <div class="row" style="padding-top:20px">
                    <div class="col-md-4 col-xs-4" style="font-size:18px">
                        <strong style="color:#228adf">Compañía</strong>
                    </div>
                    <div class="col-md-4 col-xs-4" style="font-size:18px">
                        <strong style="color:#228adf">Información</strong>
                    </div>
                    <div class="col-md-4 col-xs-4" style="font-size:18px">
                        <strong style="color:#228adf">Cuenta</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <span style="color:white">Nosotros</span>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <span style="color:white">Publica tu auto</span>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <span style="color:white">Mi Cuenta</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <span>
                          <a href="{{ route('servicios') }}"  style="color: white;text-decoration:  none;">
                            Servicio
                          </a>
                        </span>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <span style="color:white">Términos y Condiciones</span>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <span style="color:white">Favoritos</span>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <span>
                          <a href="{{ route('contacto') }}" style="color: white;text-decoration:  none;">
                            Contacto
                          </a>
                        </span>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <span style="color:white">Mapa del Sitio</span>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <span style="color:white">Carrito de Compras</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                    </div>
                    <div class="col-md-4 col-xs-4">
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <span style="color:white">Estatus de Orden</span>
                    </div>
                </div>

            </div>
            <div class="col-md-4 col-xs-12">
              <div class="row" style="padding-top:20px">
                  <div class="col-md-12 col-xs-12" style="font-size:18px">
                      <strong>Contactanos a
                        <a href="mailto:contactos@chiledesarmes.cl">contactos@chiledesarmes.cl</a>
                      </strong>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12 col-xs-12">
                      <span style="color:#fff; font-size:18px">
                          <i class="fab fa-facebook-f"></i>
                          <i class="fa fa-paper-plane"></i>
                          <i class="fab fa-twitter"></i>
                          <i class="fab fa-youtube"></i>
                          <i class="fab fa-google-plus-g"></i>
                          <i class="fa fa-share-alt"></i>
                      </span>
                  </div>
              </div>
              <div class="row">
                   <div class="col-md-12 col-xs-8">
                      <div class="input-group">
                            <input type="text" class="form-control" placeholder="EMAIL" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                              <button class="btn btn-outline-secondary" style="background-color: #248adf;color:#FFF;font-weight:bold;padding: 6px 16px;" type="button">SUSBRIBIRME</button>
                            </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="col-md-1 col-xs-1"></div>
        </div>
        <hr style="margin-top:10px;margin-bottom:10px;border-top: 1px solid #636b6f;">
        <div style="text-align:center">2018 Chiledesarmes All Right Received</div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
