@extends('layouts.app')

@section('content')
  <!-- Errores -->
  <div class="container" id="container">
    <form method="POST" action="{{ route('mispublicaciones.updateauto',$publicacion->id) }}" id="form">
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
        <div class="col-md-8">
          <div class="form-group">
            <label>Titulo</label>
            <input type="text" class="form-control" name="titulo" value="{{$publicacion->titulo}}"/>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Placa</label>
            <input type="text" class="form-control" name="placa" value="{{$publicacion->placa}}"/>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Precio</label>
            <input type="text" class="form-control" name="precio" value="{{$publicacion->monto}}"/>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Descripción</label>
            <input type="text" class="form-control" name="descripcion" value="{{$publicacion->descripcion}}"/>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Marca</label>
            <select class="form-control" name="atributos[]" id="marca_id">
              <option value="">Seleccione</option>
              @foreach ($marcas as $key => $atributo)
                <option value="{{$atributo->id}}" {{ in_array($atributo->id,  array_pluck($publicacion->atributos, 'id')) ? 'selected' : ''}}>{{$atributo->descripcion}}
                </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Modelo</label>
            <select class="form-control" name="atributos[]" id="modelo_id" >
              <option value="">Seleccione</option>
              @foreach ($modelos as $key => $atributo)
                <option value="{{$atributo->id}}" {{ in_array($atributo->id, array_pluck($publicacion->atributos, 'id')) ? 'selected' : ''}}>{{$atributo->descripcion}}
                </option>
              @endforeach
            </select>
          </div>
        </div>
        @foreach ($entidades as $key => $entidad)
          <div class="col-md-3">
            <div class="form-group">
              <label>{{$entidad->descripcion}}</label>
              <select class="form-control" name="atributos[]">
                <option value="">Seleccione</option>
                @foreach ($entidad->atributos as $key => $atributo)
                  <option value="{{$atributo->id}}" {{ in_array($atributo->id,  array_pluck($publicacion->atributos, 'id')) ? 'selected' : ''}}>{{$atributo->descripcion}}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
        @endforeach
        <div class="col-md-12 text-center" style="margin-top:50px">
          @for ($i=0; $i < 6; $i++)
            <div class="col-md-2 col-xs-6">
              <div class="col-md-12 col-xs-12">
                <img  class="img-thumbnail" id="imagen_{{$i}}" src="../../images/no-image.jpg"  style="width:120px;height:89px"/>
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
    for(i = i; i<6; i++) {
      document.getElementById('imagen_'+ i).src= '../../images/no-image.jpg';
      document.getElementById('imagen64_'+ i).value = '';
    }
  }
  function cargarImagenALienzo () {
    var fileinput = document.getElementById('imagen');
    if (document.querySelector('#imagen').value.length == 0 || imagenes.length > 6) {
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
          context.drawImage(img,100,100);
          img.setAtt  ribute('width','640px');
          imagenes.push(img.src);
          cargarImagenes();
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
