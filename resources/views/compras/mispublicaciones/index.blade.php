@extends('layouts.app')

@section('content')
<div class="container" id="container">
  <fieldset class="scheduler-border">
    <legend class="scheduler-border"><span class="title-estilo">Mis Publicaciones</span></legend>
    <div class="col-md-12">
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
          <td>{{ $publicacion->descripcion }}</td>
          <td>{{ $publicacion->created_at->format('d-m-Y h:i:s p') }}</td>
          <td>$ {{ number_format($publicacion->monto,2,',','') }}</td>
          <td>
          	<a class="btn btn-success btn-sm" href="{{ route('publicaciones.details',$publicacion->id)}}" target="_blank"><i class="fas fa-globe" data-toggle="tooltip" title="ir"></i></a>
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
</div>
@endsection
