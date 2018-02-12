@extends('layouts.app')
@section('content')

  <div class="container" id="container">
    <div class="row">
        <div class="alert alert-success" role="alert">
		  <h3 class="alert-heading"><strong>Compra realizada!</strong></h3>
		  <p>Hemos enviado un correo electronico al vendedor con tus datos <i class="fa fa-paper-plane" aria-hidden="true"></i>
		  <br>Revisa tu bandeja de entrada, te hemos enviado un correo con los datos del vendedor <i class="fa fa-envelope" aria-hidden="true"></i></p>
		  <hr>
		  <p class="mb-0">Continua revisando las demas <strong><a href="{{ route('publicaciones.index') }}">publicaciones</a></strong></p>
		</div>
   	</div>
 </div>
 @endsection