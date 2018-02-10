@extends('layouts.app')
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

	             <!--<img src="http://placehold.it/295x190/333333/FFFFFF"> -->
	            <div id="demo" class="carousel slide" data-ride="carousel">	              
	              
	              <!-- The slideshow -->
	              <div class="carousel-inner">
	                <div class="item active">
	                
	                  <img alt="Los Angeles" src="http://placehold.it/295x190/333333/FFFFFF" class="d-block w-100" >
	                </div>
	                <div class="item">
	                  <img alt="Chicago" src="http://placehold.it/295x190/333333/FFFFFF" class="d-block w-100">
	                </div>
	                <div class="item">
	                  <img alt="New York" src="http://placehold.it/295x190/333333/FFFFFF"  class="d-block w-100">
	                </div>
	              </div>
	              	           
	            </div>


	              <div class="buttons">
	                <a class="preview btn btn-large btn-info" href="{{ route('publicaciones.details', $publicacion->id) }}"><i class="icon-eye-open"></i> Ver</a>
	            </div>
	          </div>
	          <div class="info">
	            <h4>{{ $publicacion->descripcion }}</h4>
	            <h6>{{ $publicacion->user->name }}</h6>
	            <span class="description">
	              
	            </span>
	            <span class="price">$ {{ $publicacion->monto }}</span>
	            <a class="btn btn-primary pull-right" href="#"><i class="icon-shopping-cart"></i> Comprar</a>
	          </div>
	          <div class="details">
	            <span class="time"><i class="icon-time"></i> {{ $now->diffForHumans($publicacion->created_at)}}</span>
	            <span class="rating pull-right">
	               <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
	             </span>
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