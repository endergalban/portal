@extends('layouts.app')

@section('content')
<div class="container" id="container">
  
  <!-- Errores -->
  <div class="row">
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

     <!-- Datos -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Solicitudes</div>
          <div class="panel-body">
            <button class="btn btn-success" @click="cargarElemento(-1)" :disabled="index > -2">Solicitar Asistencia</button>
            <div id="divElemento" v-show="index > -2">
            <hr>
            	<form method="POST" action="{{ route('asistencia.store') }}">
            	{{ csrf_field() }}
        	 	<div class="row">
    		  		<div class="col-md-12">
                		<div class="form-group">
                  			<input type="text" name="descripcion" value="{{ old('descripcion') }}" v-model="elemento.descripcion" placeholder="Descripción de la sollicitud" style="width:100%" class="form-control">
                		</div>
              		</div>
              	</div>
                <div class="row">
                  	<div class="col-md-12">
                        <button  id="btnGuardar" class="btn btn-primary btn-sm" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Guardando..." :disabled="elemento.descripcion == ''" @click="guardar()">Guardar</button>
                        <button  class="btn btn-default btn-sm" @click.prevent="limpiarElemento()" >Cancelar</button>
                  </div>
              	</div>
            	</form>
            </div>
            <hr>
            <div class="table-responsive">
              <table class="table .table-striped">
                <thead>
                <tr>
                  <th>ID #</th>
                  <th>Descripción</th>
                  <th>Fecha</th>
                  <th>Publicaciones</th>
                  <th>Estado</th>
                </tr>
                </thead>
              <tbody>
              @foreach($asistencias as $asistencia)
              <tr >
                <td><b>{{ $asistencia->id }}</b></td>        
                <td>{{ $asistencia->descripcion }}</td> 
                <td>{{ $asistencia->created_at->format('d-m-Y h:m p') }}</td>        
                <td>
                	<button class="btn btn-success btn-sm" @click.prevent="cargarPublicaciones( {{ $loop->index}} )" >{{ count($asistencia->publicaciones) }}</button></td>        
                <td>
                	@if($asistencia->estado == 1)
                		<span class="label label-info">Solicitado</span>
                	@elseif($asistencia->estado == 2)
                		<span class="label label-primary">En proceso</span>
                	@else
                		<span class="label label-danger">Inactivo</span>
                	@endif
                </td>  
              </tr>
              @endforeach
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{$asistencias->appends(Input::all())->links()}}
 
    <!-- Modal Publicaciones -->
    <div class="modal fade" id="publicacionesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Publicaciones</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-1"># ID</div>
              <div class="col-md-2">Producto</div>
              <div class="col-md-3">Descripción</div>
              <div class="col-md-2">Fecha</div>
              <div class="col-md-1">Precio</div>
              <div class="col-md-2">Estado</div>
              <div class="col-md-1">Ver</div>
              <hr>
            </div>
            <div style="height:300px;overflow-y: none;overflow-x: none;" v-if='indexVentana > -1'>
              <div class="row" v-for="publicacion in asistencias[indexVentana].publicaciones">
                <div class="col-md-1"><b>@{{ publicacion.id }}</b></div>
                <div class="col-md-2">@{{ publicacion.producto.descripcion }}</div>
                <div class="col-md-3">@{{ publicacion.descripcion }}</div>
                <div class="col-md-2">@{{ new Intl.DateTimeFormat('es-CL',{
                year: 'numeric', month: 'numeric', day: 'numeric',
            hour: 'numeric', minute: 'numeric', second: 'numeric',
            hour12: false,
           }).format(new Date(publicacion.created_at))  }}</div>
                <div class="col-md-1">@{{ publicacion.monto }}</div>
                <div class="col-md-2">
                  <span class="label label-default" v-if="publicacion.estado == 0">Inactivo</span>
                  <span class="label label-primary" v-else="publicacion.estado == 1">Activo</span>
                  <span class="label label-success" v-else="publicacion.estado == 2">Vendido</span>
                  <span class="label label-danger" v-else="publicacion.estado == 3">De Baja</span>
                </div>
                <div class="col-md-1"><a class="btn btn-success btn-sm" :href="'../publicaciones/details/'+ publicacion.id +''" target="_blank"><i class="fas fa-globe" data-toggle="tooltip" title="ir"></i></a></div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

</div>
@push('scripts')
	<script type="text/javascript">
	  var asistenciasData = <?php echo json_encode($asistencias);?>;
	  var asistencias = asistenciasData.data;
	</script>
  <script src="{{ asset('js/validaciones.js') }}"></script>
  <script src="{{ asset('js/asistencias.js') }}"></script>
@endpush
@endsection
