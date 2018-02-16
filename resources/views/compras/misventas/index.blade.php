@extends('layouts.app')

@section('content')
<div class="container" id="container">
     <!-- Datos -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Mis ventas</div>
          <div class="panel-body">
         
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
              @foreach($ventas as $venta)
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
              @endforeach
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{$ventas->appends(Input::all())->links()}}
 
    
</div>

@endsection
