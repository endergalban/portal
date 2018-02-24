@extends('layouts.app')

@section('content')
<div class="container" id="container">
  <fieldset class="scheduler-border">
    <legend class="scheduler-border"><span class="title-estilo">Mis Ventas</span></legend>
    <div class="col-md-12">
      <fieldset class="scheduler-border">
        <legend class="scheduler-border"></legend>
        <form>
          <div class="col-md-4">
            <input type="text" name="buscar" placeholder="Ingresar busqueda..." class="form-control">
          </div>
          <div class="col-md-8">
            <button class="btn btn-primary pull-right" >Filtrar</button>
          </div>
        </form>
      </fieldset>
    </div>
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table .table-striped">
          <thead>
          <tr>
            <td># ID</td>
            <td>Comprador</td>
            <td>Producto</td>
            <td >Descripción</td>
            <td>Fecha</td>
            <td>Cantidad</td>
            <td>Precio</td>
            <td>Ver</td>
          </tr>
          </thead>
        <tbody>
      @forelse($ventas as $venta)
        <tr >
          <td><b>{{ $venta->id }}</b></td>
          <td>{{ $venta->user->name }}<br>( {{ $venta->user->email }} )</td>
          <td>{{ $venta->publicacion->producto->descripcion }}</td>
          <td>{{ $venta->publicacion->descripcion }}</td>
          <td>{{ $venta->created_at->format('d-m-Y h:i:s p') }}</td>
          <td>{{ $venta->cantidad }}</td>
          <td>$ {{ number_format($venta->monto,2,',','') }}</td>
          <td>
          	<a class="btn btn-success btn-sm" href="{{ route('publicaciones.details',$venta->publicacion_id)}}" target="_blank"><i class="fas fa-globe" data-toggle="tooltip" title="ir"></i></a>
          </td>
        </tr>
        </tbody>
      @empty
        <tr><td colspan="8">No existen ventas realizadas</td></tr>
      @endforelse
        </table>
      </div>
      {{$ventas->appends(Input::all())->links()}}
    </div>
  </fieldset>
</div>
@endsection
