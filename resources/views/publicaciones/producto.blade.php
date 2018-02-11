@extends('layouts.app')
<link href="{{ asset('css/productos.css') }}" rel="stylesheet">
<link href="{{ asset('css/grid.css') }}" rel="stylesheet">
<link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
<style type="text/css">
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
               @foreach ($entidades as $entidad)
                <span class="badge badge-primary">{{$entidad->descripcion}}</span> 
               @endforeach
              <h4><strong>$ {{ $publicacion->monto}}</strong></h4>
              <p class="card-text">{{ $publicacion->descripcion}}</p>
              <hr>
                <div class="row">
                    <div class="col-9">
                        Publicado por: {{$publicacion->user->name}}<br>
                        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                        4.0 stars
                    </div>
                    <div class="col-3">
                        <a class="btn btn-primary pull-right" href="{{ route('comprar', $publicacion->id ) }}"><i class="icon-shopping-cart"></i> Comprar</a>
                    </div>
                </div>
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