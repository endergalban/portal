@extends('layouts.app')

@section('content')
<div class="container" id="container">
  <fieldset class="scheduler-border">
    <legend class="scheduler-border"><span class="title-estilo">Ventas Asistidas</span></legend>
    <!-- Errores -->
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
    {{-- Filtros --}}
    <div class="col-md-12 col-xs-12">
      <fieldset class="scheduler-border">
        <legend class="scheduler-border"></legend>
        <form>
          <div class="col-md-3 col-xs-12">
            <div class="form-group">
              <select name="estado" class="form-control" >
                <option value="">Estado</option>
                <option value="1">Solicitado</option>
                <option value="2">En proceso</option>
                <option value="0">Inactivo</option>
              </select>
            </div>
          </div>
          <div class="col-md-3  col-xs-12">
            <div class="form-group">
              <input type="text" name="buscar" placeholder="Ingresar busqueda..." class="form-control">
            </div>
          </div>
          <div class="col-md-6 col-xs-12">
            <div class="form-group">
              <div class="pull-right">
                <button class="btn btn-primary" >Filtrar</button>
                <button class="btn btn-primary" @click.prevent="cargarElemento(-1)" :disabled="index > -2">Solicitar</button>
              </div>
            </div>
          </div>
        </form>
      </fieldset>
    </div>
    <div class="col-md-12">
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
      {{-- Listado --}}
      <div class="table-responsive">
        <table class="table .table-striped">
          <thead>
          <tr>
            <th>ID #</th>
            <th>Descripción</th>
            <th>Fecha</th>
            <th  class="text-center">Estado</th>
            <th  class="text-center">Publicaciones</th>
          </tr>
          </thead>
        <tbody>
      @forelse($asistencias as $asistencia)
        <tr >
          <td><b>{{ $asistencia->id }}</b></td>
          <td>{{ $asistencia->descripcion }}</td>
          <td>{{ $asistencia->created_at->format('d-m-Y h:m p') }}</td>
          <td class="text-center">
          	@if($asistencia->estado == 1)
          		<span class="label label-info">Solicitado</span>
          	@elseif($asistencia->estado == 2)
          		<span class="label label-primary">En proceso</span>
          	@else
          		<span class="label label-danger">Inactivo</span>
          	@endif
          </td>
          <td class="text-center">
            <button class="btn btn-primary btn-sm" @click.prevent="cargarPublicaciones( {{ $loop->index}} )" >{{ count($asistencia->publicaciones) }}</button>
          </td>
        </tr>
      @empty
        <tr><td colspan="5">No existen solicitudes de ventas asistidas</td></td>
      @endforelse
        </tbody>
        </table>
      </div>
      {{$asistencias->appends(Input::all())->links()}}
    </div>
  </fieldset>
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
            <div  v-if='indexVentana > -1'>
              <div class="table-responsive" style="height:300px;overflow-y: none;overflow-x: none;">
                <table class="table .table-striped">
                  <thead>
                    <tr>
                      <th># ID</th>
                      <th>Producto</th>
                      <th>Descripción</th>
                      <th>Fecha</th>
                      <th>Precio</th>
                      <th>Estado</th>
                      <th>Ver</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr v-for="publicacion in asistencias[indexVentana].publicaciones">
                        <td><b>@{{ publicacion.id }}</b></td>
                        <td>@{{ publicacion.producto.descripcion }}</td>
                        <td>@{{ publicacion.descripcion }}</td>
                        <td>@{{ new Intl.DateTimeFormat('es-CL',{
                        year: 'numeric', month: 'numeric', day: 'numeric',
                    hour: 'numeric', minute: 'numeric', second: 'numeric',
                    hour12: false,
                  }).format(new Date(publicacion.created_at))  }}</td>
                        <td>@{{ publicacion.monto }}</td>
                        <td>
                          <span class="label label-default" v-if="publicacion.estado == 0">Inactivo</span>
                          <span class="label label-primary" v-else="publicacion.estado == 1">Activo</span>
                          <span class="label label-success" v-else="publicacion.estado == 2">Vendido</span>
                          <span class="label label-danger" v-else="publicacion.estado == 3">De Baja</span>
                        </td>
                        <td><a class="btn btn-success btn-sm" :href="'../publicaciones/details/'+ publicacion.id +''" target="_blank"><i class="fas fa-globe" data-toggle="tooltip" title="ir"></i></a></td>
                      </tr>
                  </tbody>
                </table>
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
