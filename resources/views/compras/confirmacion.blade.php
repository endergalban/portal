@extends('layouts.app')
@section('content')

  <div class="container" id="container" style="padding-top:20px">
    <div class="row">
        <div class="alert alert-success" role="alert">
		  <h3 class="alert-heading"><strong>Compra realizada!</strong></h3>
		  Revisa el panel mis compras, para verificar lo datos del vendedor </p>
		  <hr>
		  <p class="mb-0">Continua revisando las demas <strong><a href="{{ route('publicaciones.index') }}">publicaciones</a></strong></p>
		</div>
   	</div>
 </div>
 @endsection