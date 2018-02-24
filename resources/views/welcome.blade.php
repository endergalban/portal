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
                
                <form method="get" action="{{ route('publicaciones.index')}}">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
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


                <div class="row" style="padding-top:20px;">
                    <div class="col-md-6 col-xs-6" style="text-align:left">
                        <strong>Marcas Relevantes</strong>
                    </div>
                    <div class="col-md-6 col-xs-6" style="text-align:left">
                        <strong>Tipo de Carrocería</strong>
                    </div>
                </div>

                <div class="row" style="padding-top:10px;padding-bottom:10px">
                    <div class="col-md-6 col-xs-6">
                        <div class="col-md-3 col-xs-3">
                            <img src="{{ asset('images/home/logo-audi.png') }}" style="width:100%">
                        </div>
                        <div class="col-md-3 col-xs-3">
                            <img src="{{ asset('images/home/logo-bmw.png') }}" style="width:100%">
                        </div>
                        <div class="col-md-3 col-xs-3">
                            <img src="{{ asset('images/home/logo-chevrolet.png') }}" style="width:100%">
                        </div>
                        <div class="col-md-3 col-xs-3">
                            <img src="{{ asset('images/home/logo-ford.png') }}" style="width:100%">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div class="col-md-4 col-xs-4">
                            <img src="{{ asset('images/home/suv.png') }}" style="width:100%" id="hover_suv">
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <img src="{{ asset('images/home/sedan.png') }}" style="width:100%" id="hover_sedan">
                        </div>
                        <div class="col-md-4 col-xs-4" >
                            <img src="{{ asset('images/home/convertible.png') }}" style="width:100%" id="hover_convertible">
                        </div>
                    </div>
                </div>

            <div class="row" style="padding-top:10px;padding-bottom:10px">
                <div class="col-md-6 col-xs-6" style="font-weight:  bold;font-size: 12px;">
                    <div class="col-md-3 col-xs-3">
                        AUDI
                    </div>
                    <div class="col-md-3 col-xs-3">
                        BMW
                    </div>
                    <div class="col-md-3 col-xs-3">
                        CHEVROLET
                    </div>
                    <div class="col-md-3 col-xs-3">
                        FORD
                    </div>
                </div>
                <div class="col-md-6 col-xs-6" style="font-weight:  bold;font-size: 12px;">
                    <div class="col-md-4 col-xs-4">
                        SUV
                    </div>
                    <div class="col-md-4 col-xs-4">
                        SEDAN
                    </div>
                    <div class="col-md-4 col-xs-4">
                        CONVERTIBLE
                    </div>
                </div>
            </div>


                <div class="row">
                    <div class="col-md-12 col-xs-12" style="text-align:center;padding:20px;text-decoration: underline;text-decoration-style:dotted;color: #248adf;" onclick="openBusqueda()">
                        <strong>Búsqueda avanzada</strong>
                    </div>
                </div>

                <div id="campos_busqueda_avanzanda" style="display:none">
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group">
                                <select class="form-control">
                                    <option>Tipos de Repuestos</option>
                                    @foreach( $tipos as $tipo)
                                    <option>{{$tipo->descripcion}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group">
                            <select class="form-control">
                                <option>Combustible</option>
                                @foreach( $combustible as $c)
                                    <option>{{$c->descripcion}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group">
                            <select class="form-control">
                                <option>Marcas</option>
                                @foreach( $marcas as $marca)
                                    <option>{{$marca->descripcion}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group">
                            <select class="form-control">
                                <option>Modelo</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group">
                            <select class="form-control" name="region">
                                <option>Region</option>
                                @foreach( $regiones as $region)
                                    <option>{{$region->descripcion}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6">                
                            <div class="form-group">
                            <select class="form-control">
                                <option>Año</option>
                                @for($a=1920;$a<=2018;$a++)
                                    <option value="{{$a}}">{{$a}}</option>
                                @endfor
                            </select>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                <select class="form-control">
                                    <option>Kilometraje</option>
                                    <option value="0">0 km</option>
                                    <option value="10000">10.000 km</option>
                                    <option value="20000">20.000 km</option>
                                    <option value="30000">30.000 km</option>
                                    <option value="40000">40.000 km</option>
                                    <option value="50000">50.000 km</option>
                                    <option value="60000">60.000 km</option>
                                    <option value="70000">70.000 km</option>
                                    <option value="80000">80.000 km</option>
                                    <option value="90000">90.000 km</option>
                                    <option value="100000">100.000 km</option>
                                    <option value="110000">110.000 km</option>
                                    <option value="120000">120.000 km</option>
                                    <option value="150000">150.000 km</option>
                                    <option value="200000">200.000 km</option>
                                    <option value="250000">250.000 km</option>
                                    <option value="300000">300.000 km</option>
                                    <option value="400000">400.000 km</option>

                                </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                <select class="form-control">
                                    <option>Transmision</option>
                                    @foreach( $trasmision as $t)
                                        <option>{{$t->descripcion}}</option>
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
        </fieldset>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <img src="{{ asset('images/home/publicidad-2.jpg') }}" style="width:100%">
        </div>
    </div>

    <div class="container" id="container">
        <div class="row"> 

        
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
