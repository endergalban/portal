@extends('layouts.app')

@section('content')
<div class="container hidden" id="container">
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
    <!--Filtros-->
    <div class="col-md-12">
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
              </div>
            </div>
          </div>
        </form>
      </fieldset>
    </div>
    <!--Listado-->
    <div class="col-md-12">
      <hr>
      <div class="table-responsive">
        <table class="table .table-striped">
          <thead>
          <tr>
            <th nowrap="nowrap">ID #</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Descripción</th>
            <th>Fecha</th>
            <th class="text-center">Publicaciones</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Acciones</th>
          </tr>
          </thead>
        <tbody>
        @forelse($asistencias as $asistencia)
        <tr >
          <td  nowrap="nowrap" >{{ $asistencia->id }}</td>
          <td>{{ $asistencia->user->name }}</td>
          <td>{{ $asistencia->user->email }}</td>
          <td>{{ $asistencia->descripcion }}</td>
          <td nowrap="nowrap">{{ $asistencia->created_at->format('d-m-Y h:i p') }}</td>
          <td class="text-center">
            <button class="btn btn-primary btn-sm" @click.prevent="cargarPublicaciones( {{ $loop->index}} )" >{{ count($asistencia->publicaciones) }}</button></td>
          <td class="text-center">
            @if($asistencia->estado == 1)
              <span class="label label-info">Solicitado</span>
            @elseif($asistencia->estado == 2)
              <span class="label label-primary">En proceso</span>
            @else
              <span class="label label-danger">Inactivo</span>
            @endif
          </td>
          <td class="text-center"  nowrap="nowrap" >
            <button class="btn btn-primary btn-sm" id="cambioAsistencia" data-toggle="modal" data-target="#cambioModal" data-id_asistencia="{{ $asistencia->id }}"><i class="fa fa-edit"></i></button>
            <button class="btn btn-danger btn-sm" id="eliminarAsistencia" data-toggle="modal" data-target="#eliminarModal" data-url="{{ route('admin.asistencia.destroy',$asistencia->id) }}" ><i class="fa fa-trash"></i></button>
          </td>
        </tr>
      @empty
        <tr><td colspan="8">No existen solicitudes de ventas asistidas</td></tr>
      @endforelse
        </tbody>
        </table>
      </div>
      {{$asistencias->appends(Input::all())->links()}}
    </div>
  </fieldset>
  <!-- Modal Asistencias -->
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
  <!-- Modal Cambio de Estado -->
  <form method="POST" action="{{ route('admin.asistencias.update')}}">
  {{ csrf_field() }}
  <div class="modal fade" id="cambioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cambio de Estado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="panel-body">

            <div class="form-group col-md-12">
              <select  name="estado" style="width:100%" class="form-control">
                <option value="1">Solicitado</option>
                <option value="2">En Proceso</option>
                <option value="0">Inactivo</option>
              </select>
            </div>
            <input type="hidden" name="id" id="id_asistencia" value=""/>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  </form>
  <!-- Modal eliminar -->
  <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="panel-body">
          Esta seguro que desea eliminar el registro?
        </div>
        <div class="modal-footer">
          <a type="button" id="btnsi" class="btn btn-primary">Aceptar</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>
@push('scripts')
  <script type="text/javascript">
    var asistenciasData = <?php echo json_encode($asistencias);?>;
    var asistencias = asistenciasData.data;
    $(document).on("click", "#eliminarAsistencia", function () {
      var Url = $(this).data('url');
      $("#btnsi").attr("href",Url);
    });

    $(document).on("click", "#cambioAsistencia", function () {
      $("#id_asistencia").val($(this).data('id_asistencia'));
    });
  </script>
  <script src="{{ asset('js/validaciones.js') }}"></script>
  <script src="{{ asset('js/asistencias.js') }}"></script>
@endpush
@endsection
