@extends('layouts.app')

@section('content')
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
      <div class="col-md-12 text-center" style="margin-top:50px">
        @for ($i=0; $i < 4; $i++)
          <div class="col-md-2 col-xs-6">
            <div class="col-md-12 col-xs-12">
              <img  class="img-thumbnail" id="imagen_{{$i}}" src="../../images/no-image.jpg" style="width:120px;height:89px"/>
            </div>
            <div class="col-md-12 col-xs-12">
              <label  class="label label-danger" onclick="eliminarImagen({{$i}})"><i class="fa fa-times"></i></label>
            </div>
            <input type="hidden"  name="imagenes[]" id="imagen64_{{$i}}"/>
          </div>
        @endfor
      </div>
      {{-- Input file --}}
      <div class="col-md-12 text-center">
        <input type="file" name="imagen[]" id="imagen" class="form-control" onchange="cargarImagenALienzo()" >
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <button class="btn btn-primary" >Guardar</button>
          <a class="btn btn-default" href="{{route('mispublicaciones')}}">Cancelar</a>
        </div>
      </div>
    </fieldset>
  </form>
  <canvas id="canvas" class="hidden" >Your Browser does not support canvas</canvas>
</div>
@endsection

@push('scripts')
<script>
  let imagenes = [];
  @foreach ($imagenes as $key => $value)
    imagenes.push('{{$value}}');
  @endforeach
  function cargarImagenes() {
    let i = 0;
    imagenes.forEach((imagen, key) => {
      document.getElementById('imagen_'+ key).src= imagen;
      document.getElementById('imagen64_'+ key).value= imagen;
      i++;
    });
    for(i = i; i<4; i++) {
      document.getElementById('imagen_'+ i).src= '../../images/no-image.jpg';
      document.getElementById('imagen64_'+ i).value = '';
    }
  }
  function cargarImagenALienzo () {
    var fileinput = document.getElementById('imagen');
    if(document.querySelector('#imagen').value.length == 0 || imagenes.length > 6) {
      return false;
    }
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext("2d");
    var img = new Image();
    var file = fileinput.files[0];
    if (file.type.match('image.*')) {
      var reader = new FileReader();
      // Read in the image file as a data URL.
      reader.readAsDataURL(file);
      reader.onload = function(evt){
        if( evt.target.readyState == FileReader.DONE) {
          img.src = evt.target.result;
          // context.drawImage(img,100,100);
          img.setAttribute('width','640px');
          cargarImagenes();
          imagenes.push(img.src);
        }
      }
    } else {
      alert("Solo se permiten imagenes");
    }
  }
  function eliminarImagen(key) {
    imagenes.splice(key,1);
    cargarImagenes();
  }
  $(document).ready(function() {
    cargarImagenes();
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
