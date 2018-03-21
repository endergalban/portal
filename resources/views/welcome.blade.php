@extends('layouts.app')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12 col-xs-12" style="margin-top:0">
            <img src="{{ asset('images/home/banner-nuevo-1.png') }}" style="width:100%">
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-12">
            <fieldset class="scheduler-border">
            <legend class="scheduler-border"><span class="title-estilo">Buscar</span></legend>

                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="col-md-12 col-xs-12 marcas-titulo-tipografia">
                          Marcas Relevantes
                        </div>
                        <a href="{{route('publicaciones.index')}}?buscar=Audi">
                          <div class="col-md-3 col-xs-6">
                              <div class="col-md-12 col-xs-12">
                                <img src="{{ asset('images/home/logo-audi.png') }}" style="width:100%">
                              </div>
                                <div class="col-md-12 hidden-xs marcas-tipografia" >
                                  AUDI
                                </div>
                          </div>
                        </a>
                        <a href="{{route('publicaciones.index')}}?buscar=Bmw">
                          <div class="col-md-3 col-xs-6">
                              <div class="col-md-12 col-xs-12">
                                <img src="{{ asset('images/home/logo-bmw.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                BMW
                              </div>
                          </div>
                        </a>
                        <a href="{{route('publicaciones.index')}}?buscar=Chevrolet">
                          <div class="col-md-3 col-xs-6">
                              <div class="col-md-12 col-xs-12" >
                                <img src="{{ asset('images/home/logo-chevrolet.png') }}" style="width:100%">
                              </div>
                              <div class="col-md-12 hidden-xs marcas-tipografia" >
                                CHEVROLET
                              </div>
                          </div>
                        </a>
                        <a href="{{route('publicaciones.index')}}?buscar=Ford">
                          <div class="col-md-3 col-xs-6">
                            <div class="col-md-12 col-xs-12" >
                              <img src="{{ asset('images/home/logo-ford.png') }}" style="width:100%">
                            </div>
                            <div class="col-md-12 hidden-xs marcas-tipografia" >
                              FORD
                            </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="col-md-12 col-xs-12 marcas-titulo-tipografia">
                          Tipo de Carrocería
                        </div>
                        <a href="{{route('publicaciones.index')}}?buscar=Suv">
                          <div class="col-md-4 col-xs-6">
                            <div class="col-md-12 col-xs-12" >
                              <img src="{{ asset('images/home/suv.png') }}" style="width:100%" id="hover_suv">
                            </div>
                            <div class="col-md-12 hidden-xs marcas-tipografia" >
                              SUV
                            </div>
                          </div>
                        </a>
                        <a href="{{route('publicaciones.index')}}?buscar=Sedan">
                          <div class="col-md-4 col-xs-6">
                            <div class="col-md-12 col-xs-12" >
                              <img src="{{ asset('images/home/sedan.png') }}" style="width:100%" id="hover_sedan">
                            </div>
                            <div class="col-md-12 hidden-xs marcas-tipografia" >
                              SEDAN
                            </div>
                          </div>
                        </a>
                        <a href="{{route('publicaciones.index')}}?buscar=Convertible">
                          <div class="col-md-4 col-xs-6" >
                            <div class="col-md-12 col-xs-12" >
                              <img src="{{ asset('images/home/convertible.png') }}" style="width:100%" id="hover_convertible">
                            </div>
                            <div class="col-md-12 hidden-xs marcas-tipografia" >
                              CONVERTIBLE
                            </div>
                          </div>
                        </a>
                      </div>
                </div>

                <hr>
                <form method="post" action="{{ route('publicaciones.index')}}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 col-xs-12">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" name="buscar" placeholder="Buscar...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit" style="padding-bottom:  5px;padding-top: 5px;">
                                        Buscar
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-md-12 col-xs-12" style="text-align:center;padding:20px;text-decoration: underline;text-decoration-style:dotted;color: #248adf;" onclick="openBusqueda()">
                        <strong>Búsqueda avanzada</strong>
                    </div>
                </div>

                <form method="post" action="{{ route('publicaciones.index')}}">
                {{ csrf_field() }}
                <div id="campos_busqueda_avanzanda" style="display:none">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <select name="tipo" class="form-control">
                                  <option value="">Tipos de Repuestos</option>
                                  @foreach( $tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{$tipo->descripcion}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                            <select name="combustible" class="form-control">
                                <option value="">Combustible</option>
                                @foreach( $combustible as $c)
                                    <option value="{{ $c->id }}">{{$c->descripcion}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                            <select name="marca" class="form-control">
                                <option value="">Marcas</option>
                                @foreach( $marcas as $marca)
                                    <option value="{{ $marca->id }}">{{$marca->descripcion}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                            <select name="modelo" class="form-control">
                                <option value="">Modelo</option>
                                @foreach( $modelos as $modelo)
                                    <option value="{{ $modelo->id }}" {{ Input::get('modelo') == $modelo->id ? 'selected' : '' }}>{{$modelo->descripcion}} Km</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                            <select name="region_id" class="form-control" name="region">
                                <option value="">Region</option>
                                @foreach( $regiones as $region)
                                    <option value="{{ $region->id }}">{{$region->descripcion}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                            <select name="anio" class="form-control">
                                <option value="">Año</option>
                                @foreach( $anios as $anio)
                                    <option value="{{ $anio->id }}">{{$anio->descripcion}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                <select name="kilometraje" class="form-control">
                                    <option value="">Kilometraje</option>
                                    @foreach( $kilometrajes as $kilometraje)
                                        <option value="{{ $kilometraje->id }}">{{number_format($kilometraje->descripcion,0,'','.')}} Km</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                <select name="transmision" class="form-control">
                                    <option value="">Transmision</option>
                                    @foreach( $trasmision as $t)
                                        <option value="{{ $t->id }}">{{$t->descripcion}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                                <button class="btn  btn-primary" type="submit">Buscar</button>
                        </div>
                    </div>
                </div>
              </form>
        </fieldset>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
             <img src="{{ asset('images/home/publicidad-2.jpg') }}" style="width:100%">
         </div>
     </div>
    <div class="container" id="container"  style="padding-top:20px">

        <div class="col-md-9">
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
                            <div class="item {{ $loop->iteration == 1 ? 'active' : ''}}"  style="width: 100%; height:200px">
                              <img src="{{ asset('storage/'.$imagen->ruta) }}"  class="d-block w-100" style="max-width: 100%;max-height: 100%;" >
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
@push('scripts')
<script type="text/javascript">
function openBusqueda () {
    if($('#campos_busqueda_avanzanda').css('display') == 'none') {
        $('#campos_busqueda_avanzanda').show();
    } else {
        $('#campos_busqueda_avanzanda').hide();
    }
}
</script>
@endpush
@endsection
