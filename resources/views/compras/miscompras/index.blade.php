@extends('layouts.app')

@section('content')
<div class="container" id="container">
     <!-- Datos -->
    <div class="col-md-12">

    <form>
    <div class="panel panel-default" v-show="listadoPublicaciones == 1">
      <div class="panel-body">
        <div class="row" >

          <div class="col-md-3">
            <input type="text" name="buscar" placeholder="Ingresar busqueda..." class="form-control">
          </div>
          <div class="col-md-9">
            <button class="btn btn-primary" >Filtrar</button>
          </div>
        </div>
      </div>
    </div>
    </form>

      <div class="panel panel-default">
        <div class="panel-heading">Mis Compras</div>
          <div class="panel-body">

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
              @foreach($compras as $compra)
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
              @endforeach
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{$compras->appends(Input::all())->links()}}


</div>

@endsection
