@extends('layouts.app')
<link href="{{ asset('css/productos.css') }}" rel="stylesheet">
<link href="{{ asset('css/grid.css') }}" rel="stylesheet">
<link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
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
.d-block {
  display: block !important;
}
.w-100 {
  width: 100% !important;
}
input,
button,
select,
optgroup,
textarea {
  margin: 0;
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
} 

button,
input {
  overflow: visible;
}

button,
select {
  text-transform: none;
}

.custom-select {
  display: inline-block;
  width: 100%;
  height: calc(2.25rem + 10px);
  padding: 0.375rem 1.75rem 0.375rem 0.75rem;
  line-height: 18px;
  color: #495057;
  vertical-align: middle;
  background: #fff url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E") no-repeat right 0.75rem center;
  background-size: 8px 10px;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

.custom-select:focus {
  border-color: #80bdff;
  outline: 0;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075), 0 0 5px rgba(128, 189, 255, 0.5);
}

.custom-select:focus::-ms-value {
  color: #495057;
  background-color: #fff;
}

.custom-select[multiple], .custom-select[size]:not([size="1"]) {
  height: auto;
  padding-right: 0.75rem;
  background-image: none;
}

.custom-select:disabled {
  color: #6c757d;
  background-color: #e9ecef;
}

.custom-select::-ms-expand {
  opacity: 0;
}

.custom-select-sm {
  height: calc(1.8125rem + 2px);
  padding-top: 0.375rem;
  padding-bottom: 0.375rem;
  font-size: 75%;
}

.custom-select-lg {
  height: calc(2.875rem + 2px);
  padding-top: 0.375rem;
  padding-bottom: 0.375rem;
  font-size: 125%;
}

</style>
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
          <div class="card mt-4">
            
                <div class="card-header">
                  <h2>Comprar</h2>
                </div>
                <div class="card-body">
                  <h3 class="card-title">Descripción de la Publicación</h3>
                  <p class="card-text">{{ $publicacion->descripcion}}</p><br>
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
                  <h3 class="card-title">Caracteristicas del Producto</h3>
                  <table class="table" style="width: 50%;">
                    <tbody>
                     @foreach ($entidades as $entidad)
                      <tr>                                              
                        <td style="width: 50%;">{{$entidad->descripcion}}</td>
                        <td><p class="text-center"><strong>{{$entidad->atributo}}</strong></p></td>
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
                          <p class="h5"><strong>¿Deseas realizar la compra del producto?</strong></h5>
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

                </div>
             
          </div>
         
          <!-- /.card -->

          <!-- /.card -->
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
    alert(cant);
    $('#cant').val(cant);
  }
</script>
@endpush
@endsection