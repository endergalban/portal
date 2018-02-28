@extends('layouts.app')
<link href="{{ asset('css/productos.css') }}" rel="stylesheet">
<link href="{{ asset('css/grid.css') }}" rel="stylesheet">
<link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
<link href="{{ asset('css/comprar.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
@section('content')

  <div class="container" id="container">
    <div class="row">
        @if(Session::has('success'))
          <div class="alert alert-success">
              {{ Session::get('success') }}
              @php
              Session::forget('success');
              @endphp
          </div>
          @endif

        <div class="col-lg-9">
            
       <fieldset class="scheduler-border">
        <legend class="scheduler-border"><span class="title-estilo">Comprar</span></legend>

             
                  <h3>Descripción de la Publicación</h3>
                  <p>{{ $publicacion->descripcion}}</p><br>
                  <p><small>Publicado por {{$publicacion->user->name}}</small></p>

                  <hr>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" width="60%">Producto</th>
                        <th scope="col" width="10%">Cantidad</th>
                        <th scope="col" width="20%">Monto</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>                        
                        <td>{{ $publicacion->producto->descripcion}}</td>                      
                        <td>
                        <select class="custom-select" id="cantidad">
                          @for ($i = 1; $i <= $publicacion->cantidad; $i++)                           
                            <option value="{{ $i }}" @if($i == 1 ) selected @endif >{{ $i }}</option>
                          @endfor
                        </select>
                       
                        </td>
                        <td><p class="text-right"><strong><span id="totalMonto">{{ $publicacion->monto}}</span> $</strong></p></td>
                      </tr>
                    </tbody>
                  </table>
                  <hr>
                  <h3>Caracteristicas del Producto</h3>
                  <table class="table" style="width: 50%;">
                    <tbody>
                     @foreach ($entidades as $key => $entidad)
                      <tr>                                              
                        <td style="width: 50%;">{{$key}}</td>
                        <td>
                        @foreach ($entidad as  $atributo)
                        <p class="text-center"><strong>{{$atributo}}</strong></p>
                        @endforeach
                        </td>
                      </tr> 
                     @endforeach   
                      @foreach ($entidadFija as $key => $atributo)
                      <tr>                                              
                        <td style="width: 50%;">{{$key}}</td>
                        <td><p class="text-center"><strong>{{$atributo}}</strong></p></td>
                      </tr> 
                     @endforeach                      
                    </tbody>
                  </table>
                  <p class="text-right"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick="datosCompra()">Continuar <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></p>   

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">                        
                        <div class="modal-body">
                          <p class="h5"><strong>¿Deseas realizar la compra del producto?</strong></p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                          <a href="{{ route('comprar.proceso') }}" onclick="event.preventDefault(); document.getElementById('comprar-form').submit();" class="btn btn-primary">
                                Comprar
                            </a>

                            <form id="comprar-form" action="{{ route('comprar.proceso') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <input type="hidden" name="publicacion" value="{{$publicacion->id}}">
                                 <input type="hidden" name="cant" id="cant" value="1">
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>

             </fieldset>  
         
        </div>
        <!-- /.col-lg-9 -->
         <div class="col-lg-3">
          <h1 class="my-4">Publicidad</h1>
          <div class="list-group">
            <a href="#" class="list-group-item active">Publicidad</a>
          </div>
        </div>
        <!-- /.col-lg-3 -->
      </div>
      </div>
@push('scripts')
<script type="text/javascript">

$('#cantidad').on('change',function() {
  var monto = {{$publicacion->monto}};
  var total = this.value * monto;
  $('#totalMonto').html(total);
});

  function datosCompra() {
    var cant = $('#cantidad').val();
    var monto = {{$publicacion->monto}};
    var total = cant * monto;
    $('#totalMonto').html(total);
    $('#cant').val(cant);
  }
</script>
@endpush
@endsection
