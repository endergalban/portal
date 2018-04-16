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
	<div class="container" id="container" style="padding-top:20px">
		<div class="row">
      @if(Session::get('success'))
	    <div class="alert alert-success">
	        {{ Session::get('success') }}
	        @php
	        Session::forget('success');
	        @endphp
	    </div>
    @endif

      <div class="col-lg-3">
         <div class="row">
          <form method="post" action="{{ route('publicaciones.index')}}">
               {{ csrf_field() }}
               <div class="row">
                 <fieldset class="scheduler-border" style="margin:0px !important;">
                   <legend class="scheduler-border"><span class="title-estilo">Precio</span></legend>
                   <div class="col-md-6 col-xs-12">
                       <div class="form-group">
                          <input type="text" name="min" placeholder="Min." value="{{Input::get('min')}}" class="form-control">
                       </div>
                   </div>
                   <div class="col-md-6 col-xs-12">
                       <div class="form-group">
                         <div class="form-group">
                            <input type="text" name="max" placeholder="Max" value="{{Input::get('max')}}" class="form-control">
                         </div>
                       </div>
                   </div>
               </fieldset>
            <fieldset class="scheduler-border">
                 <legend class="scheduler-border"><span class="title-estilo">Caracteristicas</span></legend>
                  <div class="row">
                     <div class="col-md-12 col-xs-12">
                         <div class="form-group">
                             <select name="tipo" class="form-control">
                               <option value="">Tipos de Carrocería</option>
                               @foreach( $tipos as $tipo)
                                 <option value="{{ $tipo->id }}" {{ Input::get('tipo') == $tipo->id ? 'selected' : '' }}>{{$tipo->descripcion}}</option>
                               @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="col-md-12 col-xs-12">
                         <div class="form-group">
                         <select name="combustible" class="form-control">
                             <option value="">Combustible</option>
                             @foreach( $combustible as $c)
                                 <option value="{{ $c->id }}" {{ Input::get('combustible') == $c->id ? 'selected' : '' }}>{{$c->descripcion}}</option>
                             @endforeach
                         </select>
                         </div>
                     </div>
                     <div class="col-md-12 col-xs-12">
                         <div class="form-group">
                         <select name="marca" class="form-control" v-model="marca_id" @change="obtenermodelos">
                             <option value="">Marcas</option>
                             @foreach( $marcas as $marca)
                                 <option value="{{ $marca->id }}" {{ Input::get('marca') == $marca->id ? 'selected' : '' }}>{{$marca->descripcion}}</option>
                             @endforeach
                         </select>
                         </div>
                     </div>
                     <div class="col-md-12 col-xs-12">
                         <div class="form-group">
                         <select name="modelo" class="form-control">
                             <option value="">Modelo</option>
                             <option v-for="item in modelos" :value="item.id">@{{item.descripcion}}</option>
                         </select>
                         </div>
                     </div>
                     <div class="col-md-12 col-xs-12">
                         <div class="form-group">
                         <select name="anio" class="form-control">
                             <option value="">Año</option>
                             @foreach( $anios as $anio)
                                 <option value="{{ $anio->id }}" {{ Input::get('modelo') == $anio->id ? 'selected' : '' }}>{{$anio->descripcion}}</option>
                             @endforeach
                         </select>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12 col-xs-12">
                         <div class="form-group">
                         <select name="region_id" class="form-control" name="region">
                             <option value="">Region</option>
                             @foreach( $regiones as $region)
                                 <option value="{{ $region->id }}" {{ Input::get('region_id') == $region->id ? 'selected' : '' }}>{{$region->descripcion}}</option>
                             @endforeach
                         </select>
                         </div>
                     </div>

                 </div>
                 <div class="row">
                     <div class="col-md-12 col-xs-12">
                         <div class="form-group">
                         <select name="kilometraje" class="form-control">
                             <option value="">Kilometraje</option>
                             @foreach( $kilometrajes as $kilometraje)
                                 <option value="{{ $kilometraje->id }}" {{ Input::get('kilometraje') == $kilometraje->id ? 'selected' : '' }}>{{number_format($kilometraje->descripcion,0,'','.')}} Km</option>
                             @endforeach
                         </select>
                         </div>
                     </div>
                     <div class="col-md-12 col-xs-6">
                         <div class="form-group">
                         <select name="transmision" class="form-control">
                             <option value="">Transmision</option>
                             @foreach( $trasmision as $t)
                                 <option value="{{ $t->id }}" {{ Input::get('transmision') == $t->id ? 'selected' : '' }}>{{$t->descripcion}}</option>
                             @endforeach
                         </select>
                         </div>
                     </div>
                 </div>
            </fieldset>
            <fieldset class="scheduler-border">
              <legend class="scheduler-border"></legend>
              <div class="row">
                <div class="col-md-12 col-xs-12">
                  <button class="btn  btn-primary" type="submit" style="width:100%">Buscar</button>
                </div>
              </div>
            </fieldset>
          </div>
        </form>
         </div>
          <h1 class="my-4">Publicidad</h1>
          <div class="list-group">
            <a href="#" class="list-group-item active">Publicidad</a>
          </div>
        </div>
	    <div class="col-lg-9">
  	    @foreach ($publicaciones as $publicacion)
  	      <div class="col-md-4" style="margin-bottom:20px">
  	        <div class="block span4">
  	          <div class="product">

  	            <div id="demo" class="carousel slide" data-ride="carousel">
  	              <!-- The slideshow -->
  	              <div class="carousel-inner">
  	              @if(count($publicacion->imagenes) == 0 )
                    <div class="item active" style="width: 100%; height:200px">
  	                   <img src="http://placehold.it/295x190/333333/FFFFFF" class="d-block w-100" style="max-width: 100%;max-height: 100%;" >
                    </div>
  	              @endif
  	              	@foreach($publicacion->imagenes as  $imagen)
  	                <div class="item {{ $loop->iteration == 1 ? 'active' : ''}}" style="width: 100%; height:200px">
  	                  <img src="{{ route('imagen_almacenada',base64_encode($imagen->ruta)) }}"  class="d-block w-100" style="max-width: 100%;max-height: 100%;">
  	                </div>
  	                @endforeach
  	              </div>

  	            </div>


                <div class="buttons">
                  <a class="preview btn btn-large btn-info" href="{{ route('publicaciones.details', $publicacion->id) }}"><i class="icon-eye-open"></i> Ver</a>
              </div>
  	          </div>
  	          <div class="info">
  	            <h5 style="text-overflow:ellipsis;"> {{ $publicacion->titulo }}</h5>
                <h6 style="text-overflow:ellipsis;">{{ $publicacion->producto->descripcion }}</h6>
  	             <h6>Cant: {{ $publicacion->cantidad }}</h6>
  	            {{-- </span> --}}
                <h6 >Publicado {{ $now->diffForHumans($publicacion->created_at)}}</h6>
                <h6 style="text-overflow:ellipsis;">Por: <strong>{{ $publicacion->user->name }}</strong></h6>
  	            <span class="price">$ {{ $publicacion->monto }}</span>
  	            {{-- <a class="btn btn-primary pull-right" href="{{ route('comprar', $publicacion->id ) }}"><i class="icon-shopping-cart"></i> Comprar</a> --}}
  	          </div>
  	          {{-- <div class="details">
                <span class="time"><i class="icon-time"></i> {{ $now->diffForHumans($publicacion->created_at)}}</span>
  	          </div> --}}
  	        </div>
  	    </div>
  	    @endforeach
        <div class="col-md-12 text-right"  >
          {{ $publicaciones->links() }}
        </div>
	    </div>


	  </div>
	 </div>
@endsection
@push('scripts')
<script src="{{asset('js/carrusel.js')}}"></script>
@endpush
