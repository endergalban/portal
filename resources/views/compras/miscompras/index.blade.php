@extends('layouts.app')

@section('content')
<div class="container" id="container">
  <fieldset class="scheduler-border">
    <legend class="scheduler-border"><span class="title-estilo">Mis Compras</span></legend>
    <div class="col-md-12">
      <fieldset class="scheduler-border">
        <legend class="scheduler-border"></legend>
        <form >
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
             <td>Producto</td>
            <td >Descripción</td>
            <td>Vendedor</td>
            <td>Fecha</td>
            <td>Cantidad</td>
            <td>Precio</td>
            <td>Ver</td>
              </tr>
          </thead>
        <tbody>
      @forelse($compras as $compra)
        <tr >
          <td><b>{{ $compra->id }}</b></td>
          <td>{{ $compra->publicacion->producto->descripcion }}</td>
          <td>{{ $compra->publicacion->descripcion }}</td>
          <td>{{ $compra->publicacion->user->name }}<br>
            {{ $compra->publicacion->user->email }}<br>
            {{ $compra->publicacion->user->telefono }}
          </td>
          <td>{{ $compra->created_at->format('d-m-Y h:i:s p') }}</td>
          <td>{{ $compra->cantidad }}</td>
          <td>$ {{ number_format($compra->monto,2,',','') }}</td>
          <td>
          	<a class="btn btn-success btn-sm" href="{{ route('publicaciones.details',$compra->publicacion_id)}}" target="_blank"><i class="fas fa-globe" data-toggle="tooltip" title="ir"></i></a>
          </td>
        </tr>
      @empty
        <tr><td colspan="8">No existen compras realizadas</td></tr>
      @endforelse
        </tbody>
        </table>
      </div>
      {{$compras->appends(Input::all())->links()}}
    </div>
  </fieldset>
</div>
@endsection
