@extends('layouts.app')
<link href="{{ asset('css/productos.css') }}" rel="stylesheet">
<link href="{{ asset('css/grid.css') }}" rel="stylesheet">
  <style type="text/css">
    .carousel {
  position: relative;
}

.carousel-inner {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.carousel-item {
  position: relative;
  display: none;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  width: 100%;
  min-height: 180px;
  height: 180px;
  transition: -webkit-transform 0.6s ease;
  transition: transform 0.6s ease;
  transition: transform 0.6s ease, -webkit-transform 0.6s ease;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-perspective: 1000px;
  perspective: 1000px;
}

.carousel-item.active,
.carousel-item-next,
.carousel-item-prev {
  display: block;
}

.carousel-item-next,
.carousel-item-prev {
  position: absolute;
  top: 0;
}

.carousel-item-next.carousel-item-left,
.carousel-item-prev.carousel-item-right {
  -webkit-transform: translateX(0);
  transform: translateX(0);
}

@supports ((-webkit-transform-style: preserve-3d) or (transform-style: preserve-3d)) {
  .carousel-item-next.carousel-item-left,
  .carousel-item-prev.carousel-item-right {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.carousel-item-next,
.active.carousel-item-right {
  -webkit-transform: translateX(100%);
  transform: translateX(100%);
}

@supports ((-webkit-transform-style: preserve-3d) or (transform-style: preserve-3d)) {
  .carousel-item-next,
  .active.carousel-item-right {
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
  }
}

.carousel-item-prev,
.active.carousel-item-left {
  -webkit-transform: translateX(-100%);
  transform: translateX(-100%);
}

@supports ((-webkit-transform-style: preserve-3d) or (transform-style: preserve-3d)) {
  .carousel-item-prev,
  .active.carousel-item-left {
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }
}

.carousel-control-prev,
.carousel-control-next { 
  position: absolute;
  top: 0;
  bottom: 0;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  width: 15%;
  color: #fff;
  text-align: center;
  opacity: 0.5;
}

.carousel-control-prev:hover, .carousel-control-prev:focus,
.carousel-control-next:hover,
.carousel-control-next:focus {
  color: #fff;
  text-decoration: none;
  outline: 0;
  opacity: .9;
}

.carousel-control-prev {
  left: 0;
}

.carousel-control-next {
  right: 0;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  display: inline-block;
  width: 20px;
  height: 20px;
  background: transparent no-repeat center center;
  background-size: 100% 100%;
}

.carousel-control-prev-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
}

.carousel-control-next-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
}

.carousel-indicators {
  position: absolute;
  right: 0;
  bottom: 10px;
  left: 0;
  z-index: 15;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  padding-left: 0;
  margin-right: 15%;
  margin-left: 15%;
  list-style: none;
}

.carousel-indicators li {
  position: relative;
  -webkit-box-flex: 0;
  -ms-flex: 0 1 auto;
  flex: 0 1 auto;
  width: 30px;
  height: 3px;
  margin-right: 3px;
  margin-left: 3px;
  text-indent: -999px;
  background-color: rgba(255, 255, 255, 0.5);
}

.carousel-indicators li::before {
  position: absolute;
  top: -10px;
  left: 0;
  display: inline-block;
  width: 100%;
  height: 10px;
  content: "";
}

.carousel-indicators li::after {
  position: absolute;
  bottom: -10px;
  left: 0;
  display: inline-block;
  width: 100%;
  height: 10px;
  content: "";
}

.carousel-indicators .active {
  background-color: #fff;
}

.carousel-caption {
  position: absolute;
  right: 15%;
  bottom: 20px;
  left: 15%;
  z-index: 10;
  padding-top: 20px;
  padding-bottom: 20px;
  color: #fff;
  text-align: center;
}

.badge-primary {
  color: #fff !important;
  background-color: #007bff !important;
}

.badge-primary[href]:hover, .badge-primary[href]:focus {
  color: #fff !important;
  text-decoration: none !important;
  background-color: #0062cc !important;
}


.d-block {
  display: block !important;
}
.w-100 {
  width: 100% !important;
}

  </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	@section('content')

  <div class="container" id="container">
    <div class="row">
       
        <div class="col-lg-9">

          <div class="card mt-4">
            <!--<img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">-->
            <div id="demo" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
              </ul>
              
              <!-- The slideshow -->
              <div class="carousel-inner">
                <div class="item active">
                
                  <img alt="Los Angeles" src="http://placehold.it/900x400" class="d-block w-100" >
                </div>
                <div class="item">
                  <img alt="Chicago" src="http://placehold.it/900x400" class="d-block w-100">
                </div>
                <div class="item">
                  <img alt="New York" src="http://placehold.it/900x400"  class="d-block w-100">
                </div>
              </div>
              
              <!-- Left and right controls -->
              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>

            <div class="card-body">
              <h3 class="card-title">{{ $producto->descripcion}}</h3>
              <span class="badge badge-primary">Categoria 1</span> 
              <span class="badge badge-primary">Categoria 1</span> 
              <span class="badge badge-primary">Categoria 1</span>
              <h4><strong>$ {{ $publicacion->monto}}</strong></h4>
              <p class="card-text">{{ $publicacion->descripcion}}</p>
              <hr>
              Publicado por: {{$publicacion->user->name}}<br>
              <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
              4.0 stars
              
            </div>
          </div>
          @if(Session::has('success'))
          <div class="alert alert-success">
              {{ Session::get('success') }}
              @php
              Session::forget('success');
              @endphp
          </div>
          @endif
          <!-- /.card -->
          <div class="card card-outline-secondary my-4" >
            <div class="card-header">
              Comentarios
            </div>
            <div class="card-body">
              
              @foreach($comentarios as $comentario)            
              <p>{{$comentario->descripcion}}</p>
              <hr>            
                <div class="row">
                  <div class="col-3">
                    <small class="text-muted">Posteado por:  <br><strong>{{$comentario->user->name}}</strong> el {{date('d-m-Y', strtotime($comentario->created_at))}}</small>
                  </div>
                  <div class="col-2">
                      @if (Auth::user() && (Auth::user()->id == $comentario->user_id))
                      <a class="btn btn-danger btn-sm" href="{{ route('comentar.eliminar',$comentario->id) }}">Eliminar</a>
                      @endif
                  </div>
                </div>              
              <hr>
              @endforeach
              
              <div class="form-group{{ $errors->has('comentario') ? ' has-error' : '' }}">
                <form class="form-horizontal" method="POST" action="{{ route('comentar') }}">
                          {{ csrf_field() }}
                    <textarea class="form-control" style="min-width: 100%" rows="5" id="comentario" name="comentario"></textarea>
                    @if ($errors->has('comentario'))
                        <span class="help-block">
                            <strong>{{ $errors->first('comentario') }}</strong>
                        </span>
                    @endif
                    <input type="hidden" name="id_publicacion"  id="id_publicacion" value="{{ $publicacion->id}}">                
                    <br>
                    <button class="btn btn-success">Comenta</button>
                </form>
              </div>

            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-lg-9 -->
         <div class="col-lg-3">
          <h1 class="my-4">Publicidad</h1>
          <div class="list-group">
            <a href="#" class="list-group-item active">Publicidad</a>
          </div>
        </div>
        <!-- /.col-lg-3 -->
      </div>
      </div>


@endsection