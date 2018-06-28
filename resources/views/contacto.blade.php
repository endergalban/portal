@extends('layouts.app')

@section('content')

	<div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-12">
            <fieldset class="scheduler-border">
		            <form method="post" action="{{ route('contacto.enviar') }}">
		            {{ csrf_field() }}
		            	<legend class="scheduler-border"><span class="title-estilo">Contactanos</span></legend>
            			<div style="background-color: white;padding: 2rem;    box-shadow: 3px 3px 10px 1px #d5daed;">
		                <div class="row">
		                	 <div class="col-md-6 col-xs-12">
		                	 	<div class="form-group">
		                	 		<input type="text" name="nombre" class="form-control" placeholder="Nombre y Apellido">
		                	 	</div>
			                	<div class="form-group">
		                	 		<input type="text" name="email" class="form-control" placeholder="Correo Electronico">
		                	 	</div>
		                	 	<div class="form-group">
			                	 	<select class="form-control" name="asunto">
			                	 		<option>Asunto</option>
			                	 		<option>Consulta</option>
			                	 		<option>Reclamo</option>
			                	 		<option>Sugerencia</option>
			                	 	</select>
			                	</div>
			                	<div class="form-group">
		                	 		<textarea rows="5" class="form-control" name="mensaje" placeholder="Ingresa tu comentario"></textarea>
		                	 	</div>
		                	 </div>
		                	 <div class="col-md-6 col-xs-12">
		                	 	<div style="color:#01b3e3;font-weight: bold;padding: 10px 0;">LLAMANOS</div>
		                	 	<div style="padding: 0 30px;">+56 2 22610522</div>
		                	 	<div style="padding: 0 30px;">+56 9 78502753</div>
		                	 	<div style="color:#01b3e3;font-weight: bold;padding: 10px 0;">ESCRIBENOS</div>
		                	 	<div style="padding: 0 30px;">contactos@chiledesarmes.cl</div>
		                	 	<div style="color:#01b3e3;font-weight: bold;padding: 10px 0;">VISITANOS</div>
		                	 	<div style="padding: 0 30px;">Mayor Abe 3012, Macul, Santiago - Chile</div>
		                	 </div>
		                </div>
		            	 <div class="row">
		            	 	<div class="col-12" style="text-align: center;">
		            	 		<button class="btn btn-primary" type="submit">Enviar</button>
		            	 	</div>
		            	 </div>
            			</div>
		            </form>
            </fieldset>
        </div>
    </div>

@endsection
