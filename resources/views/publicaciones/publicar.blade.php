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
	@if(Session::has('success'))
	<div class="alert alert-success">
	    {{ Session::get('success') }}
	</div>
	@endif
	<!--Datos de la venta-->
	<form action="{{ route('publicar.store')}}" method="POST">
	{{ csrf_field() }}
	<div class="panel panel-default" v-show="listadoPublicaciones == 0 && tab == 0">
	  	<div class="panel-body">
		  	<div class="row">
				<div class="col-md-4 text-center">
					<h3>Datos de la Publicación</h3>
				</div>
				<div class="col-md-8">
					<div class="col-md-3">
						<h5>Datos del Producto</h5>
					</div>
					<div class="col-md-3">
						<h5>Agregar Imagenes</h5>
					</div>
					<div class="col-md-3">
						<h5>Previsualizar</h5>
					</div>
					<div class="col-md-3">
						<h5>Publicar</h5>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-4 ">

					@if(Auth::user()->tipo == 1)
					<div class="col-md-12 form-group">
						<label>Solicitud de Venta Asistida</label>
						<select name="asistencia_id" style="width:100%" class="form-control">
	                      <option value="">Selecione</option>
	                      @foreach($asistencias as $asistencia)
	                        <option value="{{ $asistencia->id }}">{{ $asistencia->user->name }} : ID # {{ $asistencia->id }}</option>
	                      @endforeach
	                    </select>
					</div>
					@endif

					<div class="col-md-12 form-group">
						<label>Producto</label>
						<select class="form-control" v-model="elemento.producto_id" :change="cargarAtributos()" id="producto_id" name="producto_id">
							<option value="">Seleccione</option>
							<option v-for="(producto,index) in productos" :value="producto.id" >@{{producto.descripcion}}</option>
						</select>
					</div>

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

					<div class="col-md-12 form-group">
						<label>Monto</label>
						<input type="text" name="monto" class="form-control" v-model="elemento.monto"/>
					</div>


					<div class="col-md-12 form-group">
						<label>Cantidad</label>
						<input type="number" name="cantidad" class="form-control" v-model="elemento.cantidad"/>
					</div>


					<div class="col-md-12 form-group">
						<label>Región</label>
						<select v-model="elemento.region_id" name="region_id" style="width:100%" class="form-control">
	                      <option value="">Selecione</option>
	                      @foreach($regiones as $region)
	                        <option value="{{ $region->id }}">{{ $region->descripcion }}</option>
	                      @endforeach
	                    </select>
					</div>

				</div>
				<div class="col-md-8" >
					<div class="col-md-4" v-for="entidad in entidades">
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
			<hr>
			<div class="col-md-12">
			<div class="row">
    			<div class="col-md-6">
    				<button type="button" class="btn btn-primary" @click.prevent="cancelarPublicacion()"  >Publicaciones Anteriores</button>
    			</div>
    			<div class="col-md-6">
					<button type="button" class="btn btn-success pull-right" @click.prevent="tab = 1" :disabled="deshabilitarBtnImagenes" >Continuar</button>
	  			</div>
	  		</div>
	  		</div>

	  	</div>
	</div>
	<!--Imagenes-->
	<div class="panel panel-default" v-show="listadoPublicaciones == 0 && tab == 1">
	  	<div class="panel-body">
		  	<div class="row">
				<div class="col-md-4 text-center">
					<h3>Carga de Imagenes</h3>
				</div>
				<div class="col-md-8">
					<div class="col-md-3">
						<h5>Datos del Producto</h5>
					</div>
					<div class="col-md-3">
						<h5><b>Agregar Imagenes</b></h5>
					</div>
					<div class="col-md-3">
						<h5>Previsualizar</h5>
					</div>
					<div class="col-md-3">
						<h5>Publicar</h5>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12" >
					<div class="row">
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
				<div class="col-md-2 " v-for="n in 6">
					<img :id="'imagen_' + n " src="../images/no-image.jpg" class="img-thumbnail" style="width:200px;height:89px"/>
					<button @click.prevent="previsualizarImagen(n)" class="btn btn-sm btn-primary pull-right" v-show="! (imagenes.length < n)"><i class="fa fa-search"></i></button>
					<button @click.prevent="eliminarImagen(n)" class="btn btn-sm btn-danger pull-right" v-show="! (imagenes.length < n)"><i class="fa fa-trash"></i></button>
				</div>
			</div>
			<input type="hidden" v-for="imagen in imagenes" name="imagenes[]" :value="imagen">;
			<hr>

			<div class="col-md-12">
				<div class="row">
	    			<div class="col-md-6">
	    				<button type="button" class="btn  btn-primary" @click.prevent="cancelarPublicacion()"  >Publicaciones Anteriores</button>
	    			</div>
	    			<div class="col-md-6">
						<button type="button" class="btn  btn-success pull-right" @click.prevent="tab = 2;obtenerEntidades()"  >Continuar</button>
	    				<button type="button" class="btn  btn-default pull-right" @click.prevent="tab = 0"  >Atras</button>
		  			</div>
		  		</div>
	  		</div>

	  	</div>
	</div>

		<!--Previsualización-->
	<div class="panel panel-default" v-show="listadoPublicaciones == 0 && tab == 2">
	  	<div class="panel-body">
		  	<div class="row">
				<div class="col-md-4 text-center">
					<h3>Previsualización</h3>
				</div>
				<div class="col-md-8">
					<div class="col-md-3">
						<h5>Datos del Producto</h5>
					</div>
					<div class="col-md-3">
						<h5><b>Agregar Imagenes</b></h5>
					</div>
					<div class="col-md-3">
						<h5>Previsualizar</h5>
					</div>
					<div class="col-md-3">
						<h5>Publicar</h5>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-lg-9 col-md-offset-1">

		          <div class="card mt-4">
		            <!--<img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">-->
		            <div id="demo" class="carousel slide" data-ride="carousel" v-if="imagenes.length > 0">
		              <!-- Indicators -->
		              <ul class="carousel-indicators">

		                <li data-target="#demo" v-for="(imagen,i) in imagenes" :data-slide-to="i"  :class="i == 0 ? 'active' : ''"></li>

		              </ul>

		              <!-- The slideshow -->
		              <div class="carousel-inner">
		                <div v-for="(imagen,i) in imagenes" :class="i == 0 ? 'item active' : 'item'">

		                  <img :src="imagen" class="d-block w-100" style="width:640px;height480px" >
		                </div>


		              </div>

		              <!-- Left and right controls -->
		              <a class="carousel-control-prev" href="#demo" data-slide="prev">
		                <span class="carousel-control-prev-icon"></span>
		              </a>
		              <a class="carousel-control-next" href="#demo" data-slide="next">
		                <span class="carousel-control-next-icon"></span>
		              </a>
		            </div>
		            <div class="col-lg-12 " v-else>
		            	<div class="row">
		            	<img src="http://placehold.it/700x400" style="width:640px;height480px">
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
		                        Publicado por: <br>
		                        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
		                        4.0 stars
		                    </div>
		                    <div class="col-3">
		                        <a class="btn btn-primary pull-right disabled"><i class="icon-shopping-cart"></i> Comprar</a>
		                    </div>
		                </div>
		            </div>
		          </div>
		          <!-- /.card -->
		        </div>
		        <!-- /.col-lg-9 -->
			</div>

			<hr>

			<div class="col-md-12">
				<div class="row">
	    			<div class="col-md-6">
	    				<button type="button" class="btn  btn-primary" @click.prevent="cancelarPublicacion()"  >Publicaciones Anteriores</button>
	    			</div>
	    			<div class="col-md-6">
						<button type="button" class="btn  btn-success pull-right" @click.prevent="tab = 3"  >Continuar</button>
	    				<button type="button" class="btn  btn-default pull-right" @click.prevent="tab = 1"  >Atras</button>
		  			</div>
		  		</div>
	  		</div>

	  	</div>
	</div>

	<!--Publicar-->
	<div class="panel panel-default" v-show="listadoPublicaciones == 0 && tab == 3">
	  	<div class="panel-body">
		  	<div class="row">
				<div class="col-md-4 text-center">
					<h3>Publicar</h3>
				</div>
				<div class="col-md-8">
					<div class="col-md-3">
						<h5>Datos del Producto</h5>
					</div>
					<div class="col-md-3">
						<h5><b>Agregar Imagenes</b></h5>
					</div>
					<div class="col-md-3">
						<h5>Previsualizar</h5>
					</div>
					<div class="col-md-3">
						<h5>Publicar</h5>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-10 col-md-offset-1" style="height:500px;overflow-y:auto">
				WIKIPEDIA NO GARANTIZA LA VALIDEZ DE SUS ARTÍCULOS
				Atajo
				WP:LGR
				Wikipedia es una enciclopedia colaborativa online de contenido abierto, es decir, una asociación voluntaria de personas y grupos que desarrollan conjuntamente una fuente del conocimiento humano. Sus términos de uso permiten a cualquier persona que dispone de conexión a Internet, y de un navegador web, modificar el contenido de sus artículos o páginas. Por este motivo, por favor tenga presente que la información que encuentre en esta enciclopedia no necesariamente ha sido revisada por expertos profesionales que conozcan los temas de las diferentes materias que abarca, de la forma necesaria para proporcionar una información completa, precisa y fiable.

				Esto no significa que no vaya a encontrar información exacta y valiosa en Wikipedia; así será la mayoría de las veces. Sin embargo, Wikipedia no puede garantizar la validez de la información que encuentre aquí. El contenido de cualquier artículo puede haber sido recientemente cambiado, vandalizado o alterado por alguien cuya versión puede no corresponder con el estado de los conocimientos en las áreas pertinentes.

				No existe una revisión formal por pares
				Estamos trabajando sobre la forma de seleccionar y resaltar versiones fiables de los artículos. Nuestra activa comunidad de editores utiliza diversas herramientas tales como las páginas de cambios recientes y páginas nuevas para vigilar las modificaciones y creaciones de contenido. Sin embargo, Wikipedia no es uniformemente revisada por pares; si bien los lectores pueden corregir errores o eliminar las sugerencias erróneas en una revisión por pares informal, ellos no tienen obligación legal de hacerlo y, por ende, toda la información que se incluya se hace sin ningún tipo de garantía implícita de aptitud para cualquier fin o uso. Incluso los artículos que han sido aprobados mediante revisiones por pares informales o tras un proceso de votación de artículo destacado pueden ser más tarde modificados inapropiadamente, justo antes de que usted los lea.

				Ninguno de los autores, editores, colaboradores, patrocinadores, administradores, operadores de sistema, ni ninguna otra persona relacionada de cualquier manera con Wikipedia, en caso alguno, puede ser considerada legalmente responsable de la aparición de información inexacta, errónea o difamatoria, o por el uso que usted haga de la información contenida en sus páginas o que esté enlazada desde o hacia ellas.

				No existe contrato; licencia limitada
				La información contenida en Wikipedia se suministra libremente, sin crear ningún tipo de acuerdo o contrato entre usted y los propietarios o usuarios de este sitio, los propietarios de los servidores en los que este sitio web está alojado, los contribuyentes individuales a Wikipedia, los administradores de cualquier proyecto, los operadores del sistema, ni persona alguna relacionada con este proyecto u otros proyectos hermanos. Se le concede a usted una licencia limitada para copiar cualquier material de este sitio; esa licencia no crea en forma alguna responsabilidad contractual o extracontractual de parte de Wikipedia ni ninguno de sus agentes, miembros, organizadores u otros usuarios. Puede usar libremente la información, siempre que cumpla con las condiciones del esquema de licenciamiento de Wikipedia.

				Este no es un contrato, acuerdo o entendimiento entre usted y Wikipedia que cubra el uso o las modificaciones que usted haga respecto de la información, más allá de los términos del esquema de licenciamiento mencionado en el párrafo anterior; nadie en Wikipedia además de usted puede ser considerado responsable de los cambios, alteraciones, modificaciones o eliminaciones de cualquier información que usted mismo realice en Wikipedia o cualquiera de sus proyectos asociados.

				Marcas registradas y otros derechos
				Cualesquiera marcas registradas, marcas de servicio, marcas colectivas, derechos de diseño u otros derechos de propiedad industrial que se mencionan, usan o citan en los artículos o páginas de Wikipedia son propiedad de los respectivos titulares. Su utilización aquí no implica que usted pueda usarlos para otro propósito distinto del uso informativo idéntico o similar al contemplado por los autores originales de los artículos en Wikipedia bajo los términos del esquema de licenciamiento de Wikipedia. Salvo indicación en contrario, los sitios web de Wikipedia y Wikimedia no están relacionados con los titulares de los citados derechos, y por lo tanto Wikipedia no puede otorgar derecho alguno para el uso de materiales protegidos. El uso que usted haga de esa propiedad inmaterial o similares es exclusivamente bajo su propio riesgo.
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12 col-md-offset-1">
				<input type="hidden" name="publicacion_id" v-model="elemento.id">
					<input type="checkbox" v-model="termino"/> <b>Acepto los terminos</b>
				</div>
			</div>

			<hr>

			<div class="col-md-12">
				<div class="row">
	    			<div class="col-md-6">
	    				<button type="button" class="btn  btn-primary" @click.prevent="cancelarPublicacion()"  >Publicaciones Anteriores</button>
	    			</div>
	    			<div class="col-md-6">
						<button type="submit" class="btn  btn-warning pull-right"  :disabled="!termino">Guardar</button>
	    				<button type="button" class="btn  btn-default pull-right" @click.prevent="tab = 2"  >Atras</button>
		  			</div>
		  		</div>
	  		</div>

	  	</div>
	</div>

	</form>
	<div class="panel panel-default" v-show="listadoPublicaciones == 1">
		<div class="panel-body">
			<div class="row" >
				<div class="col-md-3">
					<select v-model="estadoFiltro" class="form-control" >
						<option value="">Estado</option>
						<option value="1">Activo</option>
						<option value="0">Inactivo</option>
					</select>
				</div>
				<div class="col-md-3">
					<input type="text" v-model="buscarFiltro" placeholder="Ingresar busqueda..." class="form-control">
				</div>
				<div class="col-md-6">
					<button class="btn btn-primary pull-right"  @click.prevent="filtrar()">Filtrar</button>
				</div>
			</div>
		</div>
	</div>
      <div class="panel panel-default" v-show="listadoPublicaciones == 1">
        <div class="panel-heading">Últimas publicaciones</div>
          <div class="panel-body">
         <button type="button" class="btn btn-success" @click.prevent="listadoPublicaciones = 0"  >Publicar</button>
         <hr>
            <div class="table-responsive">
              <table class="table .table-striped">
                <thead>
                <tr>
                  <td># ID</td>
                  <td>Producto</td>
                  <td>Descripción</td>
                  <td>Fecha</td>
                  <td>Cantidad</td>
                  <td>Precio</td>
                  <td>Estatus</td>
                  <td>Ver</td>
                    </tr>
                </thead>
              <tbody>

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
