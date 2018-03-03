@extends('layouts.app')
<link href="{{ asset('css/productos.css') }}" rel="stylesheet">
<link href="{{ asset('css/grid.css') }}" rel="stylesheet">
<link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
<style type="text/css">
.badge-primary {
  color: #fff !important;
  background-color: #007bff !important;
}
.badge-primary[href]:hover, .badge-primary[href]:focus {
  color: #fff !important;
  text-decoration: none !important;
  background-color: #0062cc !important;
}
.d-block {
  display: block !important;
}
.w-100 {
  width: 900px !important;
  height: 400 !important;
}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
@section('content')

<div class="container hidden" id="container">
	<form action="{{ route('publicar.store')}}" method="POST">
  	{{ csrf_field() }}
    <!--Datos de la venta-->
  	<div v-show="listadoPublicaciones == 0 && tab == 0">
      <fieldset class="scheduler-border">
        <legend class="scheduler-border"><span class="title-estilo">Publicando</span></legend>
  			<div class="row">
  				<div class="col-md-4 ">
    				@if(Auth::user()->tipo == 1)
    				<div class="col-md-12">
      				<div class="form-group">
      					<label>Solicitud de Venta Asistida</label>
      					<select name="asistencia_id" style="width:100%" class="form-control">
                  <option value="">Selecione</option>
                  @foreach($asistencias as $asistencia)
                    <option value="{{ $asistencia->id }}">{{ $asistencia->user->name }} : ID # {{ $asistencia->id }}</option>
                  @endforeach
                </select>
      				</div>
    				</div>
    				@endif
    				<div class="col-md-12">
      				<div class="form-group">
      					<label>Producto</label>
      					<select class="form-control" v-model="elemento.producto_id" :change="cargarAtributos()" id="producto_id" name="producto_id">
      						<option value="">Seleccione</option>
      						<option v-for="(producto,index) in productos" :value="producto.id" >@{{producto.descripcion}}</option>
      					</select>
      				</div>
    				</div>
    				<div class="col-md-12">
      				<div class="form-group">
      					<label>Estado</label>
      					<select class="form-control" name="estado" v-model="elemento.estado">
      						<option value="1">Activo</option>
      						<option value="0">Inactivo</option>
      					</select>
      				</div>
    				</div>
    				<div class="col-md-12">
    				<div class="form-group">
    					<label>Descripción</label>
    					<textarea  class="form-control" name="descripcion" rows="4" style=" resize: none;" v-model="elemento.descripcion">@{{elemento.descripcion}}</textarea>
    				</div>
  				</div>
  				</div>
  				<div class="col-md-8" >
              <div class="col-md-4">
                <div class="form-group">
        					<label>Monto</label>
        					<input type="text" name="monto" class="form-control" v-model="elemento.monto"/>
        				</div>
      				</div>
      				<div class="col-md-4">
        				<div class="form-group">
        					<label>Cantidad</label>
        					<input type="number" name="cantidad" class="form-control" v-model="elemento.cantidad"/>
        				</div>
      				</div>
      				<div class="col-md-4">
      				  <div class="form-group">
        					<label>Región</label>
        					<select v-model="elemento.region_id" name="region_id" style="width:100%" class="form-control">
                    <option value="">Selecione</option>
                    @foreach($regiones as $region)
                      <option value="{{ $region->id }}">{{ $region->descripcion }}</option>
                    @endforeach
                  </select>
      				  </div>
      				</div>

  					  <div class="col-md-4" v-for="entidad in entidades"  style="margin-top:10px">
    					  <div class="from-group">
      						<label>@{{ entidad.descripcion }}</label>
      						<div v-if="entidad.tipo == 1">
      			        <select class="form-control" name="atributos[]">
      								<option value="">Seleccione</option>
      								<option v-for="(atributo,index) in entidad.atributos" :value="atributo.id" >@{{atributo.descripcion }}</option>
      							</select>
      						</div>
      						<div v-if="entidad.tipo == 2">
      			        <select class="form-control" name="atributos[]" multiple="multiple">
      								<option v-for="(atributo,index) in entidad.atributos" :value="atributo.id" >@{{atributo.descripcion}}</option>
      							</select>
      						</div>
      						<div v-if="entidad.tipo == 3">
                  	<input type="text" class="form-control" v-for="(atributo,index) in entidad.atributos" :name="atributo.descripcion">
                  	<input type="hidden" v-for="(atributo,index) in entidad.atributos" :value="atributo.id" name="atributos[]">
      						</div>
    					  </div>
  					  </div>
  				</div>
  			</div>
  			<hr>
  			<div class="col-md-12">
    			<div class="row">
      			<div class="col-md-6">
      				<button type="button" class="btn btn-primary hidden-xs" @click.prevent="cancelarPublicacion()"  >Publicaciones Anteriores</button>
      			</div>
      			<div class="col-md-6">
  					<button type="button" class="btn btn-primary pull-right" @click.prevent="tab = 1;top()" :disabled="deshabilitarBtnImagenes" >Continuar</button>
  	  			</div>
    	  	</div>
  	  	</div>
      <fieldset>
  	</div>
  	<!--Imagenes-->
  	<div  v-show="listadoPublicaciones == 0 && tab == 1">
      <fieldset class="scheduler-border">
        <legend class="scheduler-border"><span class="title-estilo">Publicando</span></legend>
  			<div class="row">
  				<div class="col-md-12" >
  					<div class="row  hidden-xs">
  						<div class="col-md-12 text-center">
  							<canvas id="canvas" class="hidden" >Your Browser does not support canvas</canvas>
  							<div id="lienzo">
  							</div>
  						</div>
  					</div>
  							<hr>
  					<div class="row">
  						<div class="col-md-4 col-md-offset-4">
  							<input type="file" name="imagen" id="imagen" class="form-control" @change="cargarImagenALienzo(1)">
  						</div>
  					</div>
  				</div>
  			</div>
  			<hr>
  			<div class="row">
  				<div class="col-md-2 col-xs-6" v-for="n in 6">
  				  <div class="col-md-12 col-xs-12">
  					  <img :id="'imagen_' + n " src="../images/no-image.jpg" class="img-thumbnail" style="width:120px;height:89px"/>
            </div>
            <div class="col-md-122 col-xs-12">
					    <button @click.prevent="previsualizarImagen(n)" class="btn btn-sm btn-primary" v-show="! (imagenes.length < n)"><i class="fa fa-search"></i></button>
					    <button @click.prevent="eliminarImagen(n)" class="btn btn-sm btn-danger" v-show="! (imagenes.length < n)"><i class="fa fa-trash"></i></button>
				    </div>
  				</div>
  			</div>
  			<input type="hidden" v-for="imagen in imagenes" name="imagenes[]" :value="imagen">;
  			<hr>
  			<div class="col-md-12">
  				<div class="row">
  	    			<div class="col-md-6">
  	    				<button type="button" class="btn  btn-primary hidden-xs" @click.prevent="cancelarPublicacion()"  >Publicaciones Anteriores</button>
  	    			</div>
  	    			<div class="col-md-6">
  						<button type="button" class="btn  btn-PRIMARY pull-right" @click.prevent="tab = 2;obtenerEntidades();top()"  >Continuar</button>
  	    			<button type="button" class="btn  btn-default pull-right" @click.prevent="tab = 0;top()"  >Atras</button>
  		  			</div>
  		  		</div>
  	  		</div>
      <fieldset>
  	</div>
  	<!--Previsualización-->
  	<div v-show="listadoPublicaciones == 0 && tab == 2">
      <fieldset class="scheduler-border">
        <legend class="scheduler-border"><span class="title-estilo">Publicando</span></legend>
		    <div class="col-md-8 col-md-offset-2">
          <div class="card mt-4" >
            <div id="demo" class="carousel slide" data-ride="carousel" v-if="imagenes.length > 0">
              <ul class="carousel-indicators">
                <li data-target="#demo" v-for="(imagen,i) in imagenes" :data-slide-to="i"  :class="i == 0 ? 'active' : ''"></li>
              </ul>
              <div class="carousel-inner">
                <div v-for="(imagen,i) in imagenes" :class="i == 0 ? 'item active' : 'item'">
                <img :src="imagen" style="width:100%;" >
              </div>
              </div>
              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>
            <div class="col-md-7" v-else>
            	<div class="row">
            	<img src="http://placehold.it/700x400" style="width:100%">
            	</div>
            </div>
            <div class="card-body">
              <h3 class="card-title">@{{ elemento.producto }}</h3>
                <span class="badge badge-primary" v-for="item in entidadesSeleccionadas" >@{{ item }}</span>
              <h4><strong>$ @{{ elemento.monto}}</strong></h4>
              <p class="card-text">@{{ elemento.descripcion }}</p>
              <hr>
              <div class="row">
                <div class="col-9">
                  Publicado: en este momento<br>
                  Por {{Auth::user()->name}}
                </div>
                <div class="col-3">
                  <a class="btn btn-primary pull-right disabled"><i class="icon-shopping-cart"></i> Comprar</a>
                </div>
              </div>
            </div>
		      </div>
  		  </div>
    		<div class="col-md-12">
          <hr>
  			  <div class="row">
      			<div class="col-md-6">
      				<button type="button" class="btn  btn-primary hidden-xs" @click.prevent="cancelarPublicacion()"  >Publicaciones Anteriores</button>
      			</div>
      			<div class="col-md-6">
  					<button type="button" class="btn  btn-primary pull-right" @click.prevent="tab = 3;top()"  >Continuar</button>
      				<button type="button" class="btn  btn-default pull-right" @click.prevent="tab = 1;top()"  >Atras</button>
  	  			</div>
  	  		</div>
      	</div>
      </fieldset>
  	</div>
  	<!--Publicar-->
	  <div  v-show="listadoPublicaciones == 0 && tab == 3">
      <fieldset class="scheduler-border">
        <legend class="scheduler-border"><span class="title-estilo">Publicando</span></legend>
  		  <div class="row">
  			  <div class="col-md-10 col-md-offset-1" style="height:300px;overflow-y:auto">
  				WIKIPEDIA NO GARANTIZA LA VALIDEZ DE SUS ARTÍCULOS
  				Atajo
  				WP:LGR
  				Wikipedia es una enciclopedia colaborativa online de contenido abierto, es decir, una asociación voluntaria de personas y grupos que desarrollan conjuntamente una fuente del conocimiento humano. Sus términos de uso permiten a cualquier persona que dispone de conexión a Internet, y de un navegador web, modificar el contenido de sus artículos o páginas. Por este motivo, por favor tenga presente que la información que encuentre en esta enciclopedia no necesariamente ha sido revisada por expertos profesionales que conozcan los temas de las diferentes materias que abarca, de la forma necesaria para proporcionar una información completa, precisa y fiable.

  				Esto no significa que no vaya a encontrar información exacta y valiosa en Wikipedia; así será la mayoría de las veces. Sin embargo, Wikipedia no puede garantizar la validez de la información que encuentre aquí. El contenido de cualquier artículo puede haber sido recientemente cambiado, vandalizado o alterado por alguien cuya versión puede no corresponder con el estado de los conocimientos en las áreas pertinentes.

  				</div>
    		</div>
  		  <hr>
  		  <div class="row">
  			<div class="col-md-12 col-md-offset-1">
  			<input type="hidden" name="publicacion_id" v-model="elemento.id">
  				<input type="checkbox" v-model="termino"/> <b>Acepto los terminos</b>
  			</div>
  		</div>
  		  <div class="col-md-12">
          <hr>
  			  <div class="row">
      			<div class="col-md-6">
      				<button type="button" class="btn  btn-primary hidden-xs" @click.prevent="cancelarPublicacion()"  >Publicaciones Anteriores</button>
      			</div>
      			<div class="col-md-6">
    				  <button type="submit" class="btn  btn-primary pull-right"  :disabled="!termino">Guardar</button>
      				<button type="button" class="btn  btn-default pull-right" @click.prevent="tab = 2"  >Atras</button>
      			</div>
    		  </div>
  	    </div>
      </fieldset>
    </div>
  </form>
    <div v-show="listadoPublicaciones == 1">
    <fieldset class="scheduler-border">
      <legend class="scheduler-border"><span class="title-estilo">Últimas publicaciones</span></legend>
      @if(Session::has('success'))
        <div col-md-12>
          <div class="alert alert-success">
              {{ Session::get('success') }}
          </div>
        </div>
      @endif
      <div class="col-md-12 col-xs-12">
        <fieldset class="scheduler-border">
        <legend class="scheduler-border"></legend>
  			<div class="col-md-3">
  			  <div class="form-group">
  					<select v-model="estadoFiltro" class="form-control" >
  						<option value="">Estado</option>
  						<option value="1">Activo</option>
  						<option value="0">Inactivo</option>
  					</select>
  			  </div>
  			</div>
  			<div class="col-md-3">
  			  <div class="form-group">
  				  <input type="text" v-model="buscarFiltro" placeholder="Ingresar busqueda..." class="form-control">
  			  </div>
  			</div>
  			<div class="col-md-6">
				  <div class="form-group  pull-right">
					  <button class="btn btn-primary"  @click.prevent="filtrar()">Filtrar</button>
            <button type="button" class="btn btn-primary" @click.prevent="listadoPublicaciones = 0"  >Publicar</button>
				  </div>
				</div>
        </fieldset>
      </div>
      <div class="col-md-12 col-xs-12">
        <hr>
        <div class="table-responsive">
        <table class="table .table-striped">
          <thead>
          <tr>
            <th># ID</th>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Fecha</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Estatus</th>
            <th>Ver</th>
          </tr>
          </thead>
          <tbody>
            <tr><td colspan="8" v-show=" publicaciones.length == 0">No existen plublicaciones cargadas</td></tr>
            <tr v-for="(publicacion,index) in publicaciones">
              <td><b>@{{ publicacion.id }}</b></td>
              <td>@{{ publicacion.producto.descripcion }}</td>
              <td>@{{ publicacion.descripcion }}</td>
              <td>@{{ publicacion.created_at}}</td>
              <td>@{{ publicacion.cantidad }}</td>
              <td>$ @{{ publicacion.monto}}</td>
              <td>
              	<span class="label label-success" v-if="publicacion.estado == 1">Activa</span>
              	<span class="label label-danger" v-else>Inactiva</span>
              </td>
              <td>
              	<a class="btn btn-success" :href="'../publicaciones/details/'+ publicacion.id +''" target="_blank"><i class="fas fa-globe" data-toggle="tooltip" title="ir"></i></a>
              	<button   @click="editarElemento(index)" class="btn btn-primary" data-toggle="modal" data-target="#editarModal"><i class="fas fa-edit" data-toggle="tooltip" title="Editar"></i></button>
                	<!--<button @click="cargarElemento(index)" class="btn btn-danger" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></button>-->
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      </div>
    </div>
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
            <a type="button" id="btnsi" class="btn btn-success" @click="eliminarElemento()">Aceptar</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>

     <!-- Modal Editar -->
    <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="panel-body">
           	<div class="col-md-12 form-group">
				<label>Estado</label>
				<select class="form-control" name="estado" v-model="elemento.estado">
					<option value="1">Activo</option>
					<option value="0">Inactivo</option>
				</select>
			</div>

			<div class="col-md-12 form-group">
				<label>Descripción</label>
				<textarea  class="form-control" name="descripcion" rows="4" style=" resize: none;" v-model="elemento.descripcion">@{{elemento.descripcion}}</textarea>
			</div>

			<div class="col-md-6 form-group">
				<label>Monto</label>
				<input type="text" name="monto" class="form-control" v-model="elemento.monto"/>
			</div>

			<div class="col-md-6 form-group">
				<label>Cantidad</label>
				<input type="number" name="cantidad" class="form-control" v-model="elemento.cantidad"/>
			</div>
          </div>
          <div class="modal-footer">
            <a type="button" id="btnsi" class="btn btn-success" @click="actualizarElemento()" :hidden="deshabilitarBtnEditar">Guardar</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>


</div>
@push('scripts')
	<script type="text/javascript">
		var publicacionesData = <?php echo json_encode($publicaciones);?>;
		var publicaciones = publicacionesData.data;
		var auxproductos = <?php echo json_encode($productos);?>;
		var productos = [];

		auxproductos.forEach(function(producto) {
			var productoNuevo = {
    			id: producto.id,
    			descripcion: producto.descripcion,
    			entidades: []
			};
			productos.push(productoNuevo);

		});
		var i = 0;
		auxproductos.forEach(function(producto) {
			var auxEntidad= 0;
			var j = -1;
			producto.atributos.forEach(function(atributo) {
				if (auxEntidad != atributo.entidad.id) {

					auxEntidad = atributo.entidad.id;
					var entidadNuevo = {
		    			id: auxEntidad,
		    			tipo: atributo.entidad.tipo,
		    			descripcion: atributo.entidad.descripcion,
		    			atributos: []
					};
					productos[i].entidades.push(entidadNuevo);
					j = j + 1;
				}
				var atributoNuevo = {
	    			id: atributo.id,
	    			descripcion: atributo.descripcion,
				};
				productos[i].entidades[j].atributos.push(atributoNuevo)

			});
			i= i + 1;
		});

	</script>
  <script src="{{ asset('js/validaciones.js') }}"></script>
  <script src="{{ asset('js/publicar.js') }}"></script>

@endpush
@endsection
