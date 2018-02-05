@extends('layouts.app')

@section('content')
<div class="container" id="container">
    <!-- Usuarios -->

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
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Solicitudes</div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table .table-striped">
                <thead>
                <tr>
                  <th>ID #</th>
                  <th>Usuario</th>
                  <th>Email</th>
                  <th>Descripción</th>
                  <th>Fecha</th>
                  <th>Publicaciones</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                </thead>
              <tbody>
              @foreach($asistencias as $asistencia)
              <tr >
                <td><b>{{ $asistencia->id }}</b></td>        
                <td>{{ $asistencia->user->name }}</td> 
                <td>{{ $asistencia->user->email }}</td> 
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
                <td>
                  <button class="btn btn-primary btn-sm" id="cambioAsistencia" data-toggle="modal" data-target="#cambioModal" data-id_asistencia="{{ $asistencia->id }}"><i class="fa fa-edit"></i></button>
                  <button class="btn btn-danger btn-sm" id="eliminarAsistencia" data-toggle="modal" data-target="#eliminarModal" data-url="{{ route('admin.asistencia.destroy',$asistencia->id) }}" ><i class="fa fa-trash"></i></button>
                  
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
                <div class="col-md-1"><a href="#" target="_blank">Ir</a></div>
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
            <button type="submit" class="btn btn-success">Guardar</button>
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
            <a type="button" id="btnsi" class="btn btn-success">Aceptar</a>
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
