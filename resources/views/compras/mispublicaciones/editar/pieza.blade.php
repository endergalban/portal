@extends('layouts.app')

@section('content')
    <!-- Errores -->
      <div class="container" id="container">
        <form method="POST" action="{{ route('mispublicaciones.update',$publicacion->id) }}">
            {{ csrf_field() }}
            <fieldset class="scheduler-border">
                <legend class="scheduler-border"><span class="title-estilo">{{$publicacion->titulo}}</span></legend>
                @if ($errors->any())
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Descripción</label>
                        <input type="text" class="form-control" name="descripcion" value="{{$publicacion->descripcion}}"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Marca</label>
                        <select class="form-control" name="marca_id" id="marca_id">
                            <option value="">Seleccione</option>
                            @foreach ($marcas as $key => $marca)
                                <option value="{{$marca->id}}" {{ in_array($marca->id, array_pluck($publicacion->atributos, 'id')) ? 'selected' : ''}}>{{$marca->descripcion}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Modelo</label>
                        <select class="form-control" name="modelo_id"  id="modelo_id">
                            <option value="">Seleccione</option>
                            @foreach ($modelos as $key => $modelo)
                                <option value="{{$modelo->id}}" {{ in_array($modelo->id, array_pluck($publicacion->atributos, 'id')) ? 'selected' : ''}}>{{$modelo->descripcion}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Año</label>
                        <select class="form-control" name="anio_id">
                            <option value="">Seleccione</option>
                            @foreach ($anios as $key => $anio)
                                <option value="{{$anio->id}}" {{ in_array($anio->id, array_pluck($publicacion->atributos, 'id')) ? 'selected' : ''}}>{{$anio->descripcion}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Región</label>
                        <select class="form-control" name="region_id">
                            <option value="">Seleccione</option>
                            @foreach ($regiones as $key => $region)
                                <option value="{{$region->id}}" {{ in_array($region->id, array_pluck($publicacion->atributos, 'id')) ? 'selected' : ''}}>{{$region->descripcion}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Carroceria</label>
                        <select class="form-control" name="carroceria_id">
                            <option value="">Seleccione</option>
                            @foreach ($carrocerias as $key => $carroceria)
                                <option value="{{$carroceria->id}}" {{ in_array($carroceria->id, array_pluck($publicacion->atributos, 'id')) ? 'selected' : ''}}>{{$carroceria->descripcion}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Estado</label>
                        <select class="form-control" name="estado_id">
                            <option value="">Seleccione</option>
                            @foreach ($estados as $key => $estado)
                                <option value="{{$estado->id}}" {{ in_array($estado->id, array_pluck($publicacion->atributos, 'id')) ? 'selected' : ''}}>{{$estado->descripcion}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Lado</label>
                        <select class="form-control" name="lado_id">
                            <option value="">Seleccione</option>
                            @foreach ($lados as $key => $lado)
                                <option value="{{$lado->id}}" {{ in_array($lado->id, array_pluck($publicacion->atributos, 'id')) ? 'selected' : ''}}>{{$lado->descripcion}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Precio</label>
                        <input type="text" class="form-control" name="precio" value="{{ $publicacion->monto}}"/>
                    </div>
                </div>
                <hr/>
                <div class="col-md-12">
                  <div class="form-group">
                    <button class="btn btn-primary" >Guardar</button>
                    <a class="btn btn-default" href="{{route('mispublicaciones')}}">Cancelar</a>
                  </div>
                </div>
            </fieldset>
        </form>
      <div>

</div>
@push('scripts')
<script>
$(document).ready(function() {
    $("#marca_id").change(function() {
        if ($(this).val() != "") {
          $.ajax({
          type: "GET",
          url: '<?php env('APP_URL') ?>/modelos/'+$(this).val()+'/obtener',
          dataType: "json",
          success: function(data){
            $("#modelo_id option").remove();
            $("#modelo_id").append('<option value="">Seleccione</option>');
            $.each(data,function(key, registro) {
              $("#modelo_id").append('<option value='+registro.id+'>'+registro.descripcion+'</option>');
            });
          },
          error: function(data) {
            alert('error');
          }
        });
      }
    });
});
</script>
<script src="{{ asset('js/validaciones.js') }}"></script>
@endpush
@endsection
