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
	    @foreach ($publicaciones as $publicacion)
    
	      <div class="col-md-3">
	        <div class="block span3">
	          <div class="product">
	            <img src="http://placehold.it/295x190/333333/FFFFFF">
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
	            <a class="btn btn-info pull-right" href="#"><i class="icon-shopping-cart"></i> Comprar</a>
	          </div>
	          <div class="details">
	            <span class="time"><i class="icon-time"></i> {{ $now->diffForHumans($publicacion->created_at)}}</span>
	            <span class="rating pull-right">
	              <span class="star"></span>
	              <span class="star"></span>
	              <span class="star"></span>
	              <span class="star"></span>
	              <span class="star"></span>
	             </span>
	          </div>
	        </div>
	    </div>
	    @endforeach
	  </div>
	 </div>
@endsection