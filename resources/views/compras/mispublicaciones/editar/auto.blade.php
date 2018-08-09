@extends('layouts.app')

@section('content')
    <!-- Errores -->
      <div class="container" id="container">
        <form method="POST" action="{{ route('mispublicaciones.updateauto',$publicacion->id) }}">
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
                            <option value="{{$atributo->id}}" {{ in_array($atributo->id, array_pluck($publicacion->atributos, 'id')) ? 'selected' : ''}}>{{$atributo->descripcion}}
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
                                  <option value="{{$atributo->id}}" {{ in_array($atributo->id, array_pluck($publicacion->atributos, 'id')) ? 'selected' : ''}}>{{$atributo->descripcion}}
                                  </option>
                                  @endforeach
                             </select>
                       </div>
                    </div>
                @endforeach
                {{-- <div class="col-md-3">
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
               </div> --}}
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
