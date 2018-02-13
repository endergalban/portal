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
<div class="container" id="container">
	<!--Datos de la venta-->
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
					<div class="col-md-12 form-group">
						<label>Tipo de Publicación</label>
						<select class="form-control" v-model="elemento.producto_id" :change="cargarAtributos()">
							<option value="">Seleccione</option>
							<option v-for="(producto,index) in productos" :value="producto.id" >@{{producto.descripcion}}</option>
						</select>
					</div>

					<div class="col-md-12 form-group">
						<label>Estado</label>
						<select class="form-control" v-model="elemento.estado">
							<option value="1">Activo</option>
							<option value="0">Inactivo</option>
						</select>
					</div>

					<div class="col-md-12 form-group">
						<label>Descripción</label>
						<textarea  class="form-control" rows="4" style=" resize: none;" v-model="elemento.descripcion">@{{elemento.descripcion}}</textarea>
					</div>

					<div class="col-md-12 form-group">
						<label>Monto</label>
						<input type="text" class="form-control" v-model="elemento.monto"/>
					</div>


					<div class="col-md-12 form-group">
						<label>Cantidad</label>
						<input type="number" class="form-control" v-model="elemento.cantidad"/>
					</div>

					
					<div class="col-md-12 form-group">
						<label>Región</label>
						<select class="form-control">
							<option value="">Seleccione</option>
						</select>
					</div>
					<div class="col-md-12" form-group>
						<label>Comuna</label>
						<select class="form-control">
							<option value="">Seleccione</option>
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
			<hr>

			<div class="col-md-12">
				<div class="row">
	    			<div class="col-md-6">
	    				<button type="button" class="btn  btn-primary" @click.prevent="cancelarPublicacion()"  >Publicaciones Anteriores</button>
	    			</div>
	    			<div class="col-md-6">
						<button type="button" class="btn  btn-success pull-right" @click.prevent="tab = 2"  >Continuar</button>
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
		                
		                  <img :src="imagen" class="d-block w-100" >
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
		            	<img src="http://placehold.it/900x400" width="100%">	
		            	</div>
		            </div>

		            <div class="card-body">
		              <h3 class="card-title">@{{ elemento.id }}</h3>
		              
		                <span class="badge badge-primary">gfgfg</span> 
		               
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
				
			</div>

			<hr>

			<div class="col-md-12">
				<div class="row">
	    			<div class="col-md-6">
	    				<button type="button" class="btn  btn-primary" @click.prevent="cancelarPublicacion()"  >Publicaciones Anteriores</button>
	    			</div>
	    			<div class="col-md-6">
						<button type="button" class="btn  btn-warning pull-right" @click.prevent="tab = 4"  >Guardar</button>
	    				<button type="button" class="btn  btn-default pull-right" @click.prevent="tab = 2"  >Atras</button>
		  			</div>
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
                <td>$ @{{ publicacion.estado}}</td>        
                <td>
                	<a class="btn btn-info btn-sm" >Ir</a>
                	<button @click="cargarElemento(index)" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#guardarModal"><i class="fas fa-edit" data-toggle="tooltip" title="Editar"></i></button>
                  	<button @click="cargarElemento(index)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></button>
                </td>        
              </tr>
             
              </tbody>
              </table>
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