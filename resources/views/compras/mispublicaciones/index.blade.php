@extends('layouts.app')

@section('content')
<div class="container" id="container">
  <fieldset class="scheduler-border">
    <legend class="scheduler-border"><span class="title-estilo">Mis Publicaciones</span></legend>
    <div class="col-md-12">
      @if(Session::has('success'))
       <div class="alert alert-success">
           {{ Session::get('success') }}
           @php
           Session::forget('success');
           @endphp
       </div>
     @endif

      <fieldset class="scheduler-border">
        <legend class="scheduler-border"></legend>
        <form>
          <div class="col-md-4 col-xs-12">
            <div class="form-group">
              <input type="text" name="buscar" placeholder="Ingresar busqueda..." class="form-control">
            </div>
          </div>
          <div class="col-md-8 col-xs-12">
            <div class="form-group">
              <button class="btn btn-primary pull-right" >Filtrar</button>
            </div>
          </div>
        </form>
      </fieldset>
    </div>
    <div class="col-md-12 col-xs-12">
      <hr>
      <div class="table-responsive">
        <table class="table .table-striped">
          <thead>
          <tr>
            <th>Tipo</th>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Fecha</th>
            <th>Precio</th>
            <th>Ver</th>
          </tr>
          </thead>
        <tbody>
      @forelse($publicaciones as $publicacion)
        <tr >
          <td>{{ $publicacion->producto->descripcion }}</td>
          <td>{{ $publicacion->titulo }}</td>
          <td>{{ $publicacion->descripcion }}</td>
          <td>{{ $publicacion->created_at->format('d-m-Y h:i:s p') }}</td>
          <td nowrap="nowrap">$ {{ number_format($publicacion->monto,2,',','') }}</td>
          <td nowrap="nowrap">
          	<a class="btn btn-success btn-sm" href="{{ route('publicaciones.details',$publicacion->id)}}" target="_blank"><i class="fas fa-globe" data-toggle="tooltip" title="ir"></i></a>

            <a class="btn btn-primary btn-sm" href="{{ route('mispublicaciones.edit',$publicacion->id)}}"><i class="fas fa-edit" data-toggle="tooltip" title="Editar la publicacion"></i></a>

            <button class="btn btn-danger btn-sm btnVentanaEliminar" data-url="{{ route('publicaciones.delete',$publicacion->id)}}" {{$publicacion->compras_count > 0 ? 'disabled' : '' }}><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar publicación"></i></button>
          </td>
        </tr>
        </tbody>
      @empty
        <tr><td colspan="8">No existen publicaciones realizadas</td></tr>
      @endforelse
        </table>
      </div>
      {{$publicaciones->appends(Input::all())->links()}}
    </div>
  </fieldset>
  <!-- Modal -->
  <div class="modal fade" id="ventanaEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <p class="h5"><strong>¿Deseas eliminar la publicación?</strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary disable" id="btnEliminar" >Eliminar</button>
        </div>
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script type="text/javascript">
  let url = '';
  $('.btnVentanaEliminar').on('click',function() {
    url = '';
    $('#ventanaEliminar').modal();
    url = $(this).data('url');
  });
  $('#btnEliminar').on('click',function() {
    $('#ventanaEliminar').modal('hide');
    document.location = url;
  });
</script>
@endpush
@endsection
