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
                                <select name="atributo[]" class="form-control">
                                  <option value="">Tipos de Repuestos</option>
                                  @foreach( $tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{$tipo->descripcion}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                            <select name="atributo[]" class="form-control">
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
                            <select name="atributo[]" class="form-control">
                                <option value="">Marcas</option>
                                @foreach( $marcas as $marca)
                                    <option value="{{ $marca->id }}">{{$marca->descripcion}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                            <select name="atributo[]" class="form-control">
                                <option value="">Modelo</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                            <select name="atributo[]" class="form-control" name="region">
                                <option value="">Region</option>
                                @foreach( $regiones as $region)
                                    <option value="{{ $region->id }}">{{$region->descripcion}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                            <select name="atributo[]" class="form-control">
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
                                <select name="atributo[]" class="form-control">
                                    <option value="">Kilometraje</option>
                                    @foreach( $kilometrajes as $kilometraje)
                                        <option value="{{ $kilometraje->id }}">{{number_format($kilometraje->descripcion,0,'','.')}} Km</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                <select name="atributo[] " class="form-control">
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
