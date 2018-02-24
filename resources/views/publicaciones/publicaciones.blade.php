@extends('layouts.app')
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

</style>
	@section('content')
	<div class="container" id="container">
		<div class="row"> 
		
		@if(Session::has('success'))
	    <div class="alert alert-success">
	        {{ Session::get('success') }}
	        @php
	        Session::forget('success');
	        @endphp
	    </div>
	    @endif

	    <div class="col-lg-9">
	    
	    @foreach ($publicaciones as $publicacion)
    
	      <div class="col-md-4">
	        <div class="block span4">
	          <div class="product">

	            <div id="demo" class="carousel slide" data-ride="carousel">	              
	              <!-- The slideshow -->
	              <div class="carousel-inner">
	              @if(count($publicacion->imagenes) == 0 )
	              <img src="http://placehold.it/295x190/333333/FFFFFF" class="d-block w-100" >
	              @endif
	              	@foreach($publicacion->imagenes as  $imagen)
	                <div class="item {{ $loop->iteration == 1 ? 'active' : ''}}">
	                  <img src="{{ asset('storage/'.$imagen->ruta) }}"  class="d-block w-100" >
	                </div>
	                @endforeach
	              </div>
	              	           
	            </div>


	              <div class="buttons">
	                <a class="preview btn btn-large btn-info" href="{{ route('publicaciones.details', $publicacion->id) }}"><i class="icon-eye-open"></i> Ver</a>
	            </div>
	          </div>
	          <div class="info">
	            <h4>{{ $publicacion->producto->descripcion }}</h4>	            
	            <span class="description">
	             @foreach ($publicacion->atributos()->groupBy('entidad_id')->get() as $atributo)
	           
	             		<span class="badge badge-primary">{{$atributo->entidad->descripcion}}</span>
	             @endforeach
	             <h6>Cant: {{ $publicacion->cantidad }}</h6>
	            </span>
	            <h6>Publicado por: <strong>{{ $publicacion->user->name }}</strong></h6>
	            <span class="price">$ {{ $publicacion->monto }}</span>
	            <a class="btn btn-primary pull-right" href="{{ route('comprar', $publicacion->id ) }}"><i class="icon-shopping-cart"></i> Comprar</a>
	          </div>
	          <div class="details">
	            <span class="time"><i class="icon-time"></i> {{ $now->diffForHumans($publicacion->created_at)}}</span>	           
	          </div>
	        </div>
	    </div>
	    @endforeach
	    </div>

	     <div class="col-lg-3">
          <h1 class="my-4">Publicidad</h1>
          <div class="list-group">
            <a href="#" class="list-group-item active">Publicidad</a>
          </div>
        </div>
        
	  </div>
	 </div>
@endsection