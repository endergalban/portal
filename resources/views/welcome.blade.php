@extends('layouts.app')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12" style="margin-top:0">
            <img src="{{ asset('images/home/banner-nuevo-1.png') }}" style="width:100%">
        </div>
    </div>

    <form method="get" action="{{ route('publicaciones.index')}}">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" name="buscar" placeholder="Buscar...">
                    <span class="input-group-btn">
                        <button class="btn btn-default-sm" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </form>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <fieldset class="scheduler-border">
            <legend class="scheduler-border"><span class="title-estilo">Buscar</span></legend>
            <div class="row">
                <div class="col-md-6" style="text-align:left">
                    <strong>Marcas Relevantes</strong>
                </div>
                <div class="col-md-6" style="text-align:left">
                    <strong>Tipo de Carrocería</strong>
                </div>
            </div>
            <div class="row" style="padding-top:10px;padding-bottom:10px">
                <div class="col-md-6">
                    <div class="col-md-3">
                        <img src="{{ asset('images/home/logo-audi.png') }}" style="width:100%">
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('images/home/logo-bmw.png') }}" style="width:100%">
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('images/home/logo-chevrolet.png') }}" style="width:100%">
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('images/home/logo-ford.png') }}" style="width:100%">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-4">
                        <img src="{{ asset('images/home/suv.png') }}" style="width:100%" id="hover_suv">
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('images/home/sedan.png') }}" style="width:100%" id="hover_sedan">
                    </div>
                    <div class="col-md-4" >
                        <img src="{{ asset('images/home/convertible.png') }}" style="width:100%" id="hover_convertible">
                    </div>
                </div>
            </div>

            <div class="row" style="padding-top:10px;padding-bottom:10px">
                <div class="col-md-6" style="font-weight:  bold;font-size: 12px;">
                    <div class="col-md-3">
                        AUDI
                    </div>
                    <div class="col-md-3">
                        BMW
                    </div>
                    <div class="col-md-3">
                        CHEVROLET
                    </div>
                    <div class="col-md-3">
                        FORD
                    </div>
                </div>
                <div class="col-md-6" style="font-weight:  bold;font-size: 12px;">
                    <div class="col-md-4">
                        SUV
                    </div>
                    <div class="col-md-4">
                        SEDAN
                    </div>
                    <div class="col-md-4">
                        CONVERTIBLE
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="buscar" placeholder="Palabras clave">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control">
                            <option>Tipos de Repuestos</option>
                            @foreach( $tipos as $tipo)
                            <option>{{$tipo->descripcion}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <select class="form-control">
                        <option>Marcas</option>
                        @foreach( $marcas as $marca)
                            <option>{{$marca->descripcion}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <select class="form-control">
                        <option>Modelo</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <select class="form-control" name="region">
                        <option>Region</option>
                        @foreach( $regiones as $region)
                            <option>{{$region->descripcion}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="col-md-6">                
                    <div class="form-group">
                    <select class="form-control">
                        <option>Año</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-bottom:10px">
                <div class="col-md-12" onclick="openBusqueda()">
                    Búsqueda Avanzada
                </div>
            </div>
            <div id="campos_busqueda_avanzanda" style="display:none">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <select class="form-control">
                            <option>Color</option>
                            
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <div class="form-group">
                        <select class="form-control">
                            <option>Kilometraje</option>
                          
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
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
            </div>
            <div class="row">
                <div class="col-md-12">
                        <button class="btn  btn-primary" type="submit">Buscar</button>
                </div>
            </div>
        </fieldset>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <img src="{{ asset('images/home/publicidad-2.jpg') }}" style="width:100%">
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            Productos
        </div>
    </div>

</div>
@push('scripts')
<script type="text/javascript">
function openBusqueda () {
    if($('#campos_busqueda_avanzanda').css('display') == 'none') {
        $('#campos_busqueda_avanzanda').show('slow');
    } else {
        $('#campos_busqueda_avanzanda').hide('slow');
    }
}
</script>
@endpush
@endsection
