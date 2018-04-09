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
.accordion {
  background-color: transparent;
  border-radius: 0px;
  background-image: none;
  border: 1px solid #ccd0d2;
  margin-top: 15px;
}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
@section('content')


<div class="container hidden" id="container">
	<form action="{{ route('publicar.store')}}" method="POST" @submit.prevent="guardar()" id="form">
  	{{ csrf_field() }}
    <input type="hidden" name="publicacion_id" v-model="elemento.id">
    <div  >
      <fieldset class="scheduler-border">
        <legend class="scheduler-border"><span class="title-estilo">@{{ cabecera }}</span></legend>

          <div class="alert alert-danger" v-show="mensajeError.length > 0">
              <ul>
                  <li v-for="mensaje in mensajeError">@{{ mensaje }}</li>
              </ul>
          </div>
          <div class="alert alert-success" v-show="mensajeOk != ''">
              <ul>
                  <li>@{{ mensajeOk }}</li>
              </ul>
          </div>

          {{-- Pantall Inicial --}}
          <div v-show="tipo == 0 && tab == 0">
            <div class="col-md-6 text-center">
              <a href="#" @click.prevent="cambioTipo(1,1)">Completo</a>
            </div>
            <div class="col-md-6  text-center">
              <a href="#" @click.prevent="cambioTipo(2,1)">Por Parte</a>
            </div>
          </div>
          {{-- Venta por Auto --}}
          <div class="row" v-if="tipo == 1 && tab == 1">
            {{-- Imagenes --}}
            <div class="col-md-12 text-center">
              <div class="col-md-2 col-xs-6" v-for="n in 6">
                <div class="col-md-12 col-xs-12">
                  <img :id="'imagen_' + n " src="../images/no-image.jpg" class="img-thumbnail" style="width:120px;height:89px"/>
                </div>
                <div class="col-md-12 col-xs-12">
                  {{-- <button @click.prevent="previsualizarImagen(n)" class="btn btn-sm btn-primary" v-show="! (imagenes.length < n)"><i class="fa fa-search"></i></button> --}}
                  <button @click.prevent="eliminarImagen(n)" class="btn btn-sm btn-danger" v-show="! (imagenes.length < n)"><i class="fa fa-trash"></i></button>
                </div>
              </div>
              <canvas id="canvas" class="hidden" >Your Browser does not support canvas</canvas>
            </div>
            {{-- Input file --}}
            <div class="col-md-12 text-center">
              <hr>
              <input type="file" name="imagen[]" id="imagen" class="form-control" :disabled="imagenes.length > 5" @change="cargarImagenALienzo(1)" >
              <hr>
            </div>
            {{-- Datos --}}
            {{-- linea 1 --}}
            <div class="col-md-12" :class="{'has-error' : (elemento.producto_id > 0 && elemento.producto_id == '')}" >
              <div class="col-md-4" >
                <div class="form-group">
                  <label>Tipo de Vehiculo</label>
                  <select class="form-control" name="producto_id" v-model="elemento.producto_id" @change="obtener()">
                    <option value="">Seleccione</option>
                    @foreach ($productos as $key => $producto)
                      <option value="{{$producto->id}}">{{$producto->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4" :class="{'has-error' : (elemento.producto_id > 0 && elemento.placa == '')}">
                <div class="form-group">
                  <label>Placa</label>
                  <input type="text"   class="form-control" name="placa" :disabled="elemento.producto_id == 0" v-model="elemento.placa" >
                </div>
              </div>

              <div class="col-md-4" :class="{'has-error' : (elemento.producto_id > 0 && elemento.region_id == '')}">
                <div class="form-group">
                  <label>Región</label>
                  <select class="form-control" name="atributo[]" :disabled="entidades.region.length == 0" v-model="elemento.region_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.region">@{{item.descripcion}}</option>
                  </select>
                </div>
              </div>
            </div>
            {{-- linea 2 --}}
            <div class="col-md-12" >
              <div class="col-md-4" :class="{'has-error' : (elemento.producto_id > 0 && elemento.marca_id == '')}">
                <div class="form-group">
        					<label>Marca</label>
        					<select class="form-control" name="atributos[]" id="id_marca" v-model="elemento.marca_id" :disabled="entidades.marca.length == 0" @change="obtenermodelos">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.marca">@{{item.descripcion}}</option>
                  </select>
        				</div>
      				</div>
              <div class="col-md-4" :class="{'has-error' : (elemento.producto_id > 0 && elemento.modelo_id == '')}">
                <div class="form-group">
                  <label>Modelo</label>
                  <select class="form-control" name="atributos[]" :disabled="entidades.modelo.length == 0" v-model="elemento.modelo_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.modelo">@{{item.descripcion}}</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4" :class="{'has-error' : (elemento.producto_id > 0 && elemento.anio_id == '')}">
                <div class="form-group">
                  <label>Año</label>
                  <select class="form-control" name="atributos[]" :disabled="entidades.anio.length == 0" v-model="elemento.anio_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.anio">@{{item.descripcion}}</option>
                  </select>
                </div>
              </div>
            </div>
            {{-- linea 3 --}}
            <div class="col-md-12">
              <div class="col-md-4" >
                <div class="form-group">
        					<label>Versión</label>
        					<select class="form-control" name="atributos[]" :disabled="entidades.version.length == 0" v-model="elemento.version_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.version">@{{item.descripcion}}</option>
                  </select>
        				</div>
      				</div>
              <div class="col-md-4" :class="{'has-error' : (elemento.producto_id > 0 && elemento.titulo == '')}">
                <div class="form-group" >
        					<label>Título</label>
        					<textarea   rows="3" class="form-control" name="titulo" :disabled="elemento.producto_id == 0" v-model="elemento.titulo">
                  </textarea>
        				</div>
      				</div>
              <div class="col-md-4" :class="{'has-error' : (elemento.producto_id > 0 && elemento.descripcion == '')}">
                <div class="form-group">
                  <label>Descripción</label>
                  <textarea  rows="3" class="form-control" name="descripcion" :disabled="elemento.producto_id == 0" v-model="elemento.descripcion">
                  </textarea>
                </div>
              </div>
            </div>
            {{-- linea 4 --}}
            <div class="col-md-12">
              <h3>Información General</h3>
              <hr>
            </div>
            {{-- linea 5 --}}
            <div class="col-md-12">
              <div class="col-md-4" >
                <div class="form-group">
        					<label>Carroceria</label>
        					<select class="form-control" name="atributos[]" :disabled="entidades.carroceria.length == 0" v-model="elemento.carroceria_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.carroceria">@{{item.descripcion}}</option>
                  </select>
        				</div>
      				</div>
              <div class="col-md-4" >
                <div class="form-group">
                  <label>Puertas</label>
                  <select class="form-control" name="atributos[]" :disabled="entidades.puerta.length == 0" v-model="elemento.puerta_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.puerta">@{{item.descripcion}}</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4" >
                <div class="form-group">
                  <label>Transmisión</label>
                  <select class="form-control" name="atributos[]" :disabled="entidades.transmision.length == 0" v-model="elemento.transmision_id" >
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.transmision">@{{ item.descripcion }}</option>
                  </select>
                </div>
              </div>
            </div>
            {{-- linea 6--}}
            <div class="col-md-12">
              <div class="col-md-4" >
                <div class="form-group">
        					<label>Edición (ej: GL)</label>
        					<select class="form-control" name="atributos[]" :disabled="entidades.edicion.length == 0" v-model="elemento.edicion_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.edicion">@{{ item.descripcion }}</option>
                  </select>
        				</div>
      				</div>
              <div class="col-md-4" :class="{'has-error' : (elemento.producto_id > 0 && elemento.monto == '' )}">
                <div class="form-group">
                  <label>Precio</label>
                  <input type="text" class="form-control" name="monto" :disabled="elemento.producto_id == 0" v-model="elemento.monto" onkeypress="return filterFloat(event,this);">
                </div>
              </div>
            </div>
            {{-- linea 7 --}}
            <div class="col-md-12">
              <div class="col-md-4" >
                <div class="form-group">
        					<label>Cilindrarda</label>
        					<select class="form-control" name="atributos[]" :disabled="entidades.cilindrada.length == 0" v-model="elemento.cilindrada_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.cilindrada">@{{ item.descripcion }}</option>
                  </select>
        				</div>
      				</div>
              <div class="col-md-4" >
                <div class="form-group">
                  <label>Potencia</label>
                  <select class="form-control" name="atributos[]" :disabled="entidades.potencia.length == 0" v-model="elemento.potencia_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.potencia">@{{ item.descripcion }}</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4" >
                <div class="form-group">
                  <label>Color</label>
                  <select class="form-control" name="atributos[]" :disabled="entidades.color.length == 0" v-model="elemento.color_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.color">@{{ item.descripcion }}</option>
                  </select>
                </div>
              </div>
            </div>
              {{-- linea 8 --}}
            <div class="col-md-12">
              <div class="col-md-4" >
                <div class="form-group">
        					<label>Kilometraje</label>
        					<select class="form-control" name="atributos[]" :disabled="entidades.kilometraje.length == 0" v-model="elemento.kilometro_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.kilometraje">@{{ item.descripcion }}</option>
                  </select>
        				</div>
      				</div>
              <div class="col-md-4" >
                <div class="form-group">
                  <label>Motor</label>
                  <select class="form-control" name="atributos[]" :disabled="entidades.motor.length == 0" v-model="elemento.motor_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.motor">@{{ item.descripcion }}</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4" >
                <div class="form-group">
                  <label>Techo</label>
                  <select class="form-control" name="atributos[]" :disabled="entidades.techo.length == 0" v-model="elemento.techo_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.techo">@{{ item.descripcion }}</option>
                  </select>
                </div>
              </div>
            </div>
              {{-- linea 7 --}}
            <div class="col-md-12">
              <div class="col-md-4" >
                <div class="form-group">
        					<label>Tipo de Combustible</label>
        					<select class="form-control" name="atributos[]"  :disabled="entidades.combustible.length == 0" v-model="elemento.combustible_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.combustible">@{{ item.descripcion }}</option>
                  </select>
        				</div>
      				</div>
              <div class="col-md-4" >
                <div class="form-group">
                  <label>Tipo de Dirección</label>
                  <select class="form-control" name="atributos[]" :disabled="entidades.direccion.length == 0" v-model="elemento.direccion_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.direccion">@{{ item.descripcion }}</option>
                  </select>
                </div>
              </div>
            </div>
            {{-- Seguridad --}}
            <div class="col-md-12" v-show="entidades.seguridad.length > 0">
              <div class="col-md-12" style="margin-bottom:10px">
                <label>Seguridad</label>
              </div>
              <div class="col-md-12" >
                <div class="col-md-3"  style="margin-bottom:10px" v-for="item in entidades.seguridad">
                  <input type="checkbox" name="atributos[]" :value="item.id"/> @{{item.descripcion}}
                </div>
              </div>
            </div>
            {{-- Confort --}}
            <div class="col-md-12" v-show="entidades.comfort.length > 0">
              <div class="col-md-12" style="margin-bottom:10px">
                <label>Comfort</label>
              </div>
              <div class="col-md-12" >
                <div class="col-md-3"  style="margin-bottom:10px" v-for="item in entidades.comfort">
                  <input type="checkbox" name="atributos[]" :value="item.id" /> @{{item.descripcion}}
                </div>
              </div>
            </div>
            {{-- Sonido --}}
            <div class="col-md-12" v-show="entidades.sonido.length > 0">
              <div class="col-md-12" style="margin-bottom:10px">
                <label>Comfort</label>
              </div>
              <div class="col-md-12" >
                <div class="col-md-3"  style="margin-bottom:10px" v-for="item in entidades.sonido">
                  <input type="checkbox" name="atributos[]" :value="item.id" /> @{{item.descripcion}}
                </div>
              </div>
            </div>
            {{-- Exterior --}}
            <div class="col-md-12" v-show="entidades.exterior.length > 0">
              <div class="col-md-12" style="margin-bottom:10px">
                <label>Comfort</label>
              </div>
              <div class="col-md-12" >
                <div class="col-md-3"  style="margin-bottom:10px" v-for="item in entidades.exterior">
                  <input type="checkbox" name="atributos[]" :value="item.id" /> @{{item.descripcion}}
                </div>
              </div>
            </div>
            {{-- Seguridad --}}
            <div class="col-md-12" v-show="entidades.sonido.length > 0">
              <div class="col-md-12" style="margin-bottom:10px">
                <label>ficha</label>
              </div>
              <div class="col-md-12" >
                <div class="col-md-3"  style="margin-bottom:10px" v-for="item in entidades.ficha">
                  <input type="checkbox" name="atributos[]" :value="item.id" /> @{{item.descripcion}}
                </div>
              </div>
            </div>
            {{-- Botones --}}
            <div  class="col-md-12" style="margin-top:50px">
              <button type="button" class="btn btn-default hidden-xs" v-show="tab > 0" @click="volver">Volver <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></button>
              <button type="submit" class="btn btn-primary hidden-xs pull-right" :disabled="deshabilitarBtnPublicar"  v-show="tab > 0">Publicar <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></button>
            </div>
          </div>
          <div class="row" v-if="tipo == 2 && tab == 1">
            {{-- selects --}}
            <div class="col-md-4 accordion">
              <div class="col-md-12" >
                <div class="form-group">
                  <label>Tipo de Vehiculo</label>
                  <select class="form-control" name="producto_id" v-model="elemento.producto_id" @change="obtener()">
                    <option value="">Seleccione</option>
                    @foreach ($productos as $key => $producto)
                      <option value="{{$producto->id}}">{{$producto->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12" :class="{'has-error' : (elemento.producto_id > 0 && elemento.marca_id == '')}">
                <div class="form-group">
        					<label>Marca</label>
        					<select class="form-control" name="atributos[]" id="id_marca" v-model="elemento.marca_id" :disabled="entidades.marca.length == 0" @change="obtenermodelos">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.marca">@{{item.descripcion}}</option>
                  </select>
        				</div>
      				</div>
              <div class="col-md-12" :class="{'has-error' : (elemento.producto_id > 0 && elemento.modelo_id == '')}">
                <div class="form-group">
                  <label>Modelo</label>
                  <select class="form-control" name="atributos[]" :disabled="entidades.modelo.length == 0" v-model="elemento.modelo_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.modelo">@{{item.descripcion}}</option>
                  </select>
                </div>
              </div>

              <div class="col-md-12" :class="{'has-error' : (elemento.producto_id > 0 && elemento.region_id == '')}">
                <div class="form-group">
                  <label>Año</label>
                  <select class="form-control" name="atributo[]" :disabled="entidades.anio.length == 0" v-model="elemento.anio_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.anio">@{{item.descripcion}}</option>
                  </select>
                </div>
              </div>

              <div class="col-md-12" :class="{'has-error' : (elemento.producto_id > 0 && elemento.region_id == '')}">
                <div class="form-group">
                  <label>Región</label>
                  <select class="form-control" name="atributo[]" :disabled="entidades.region.length == 0" v-model="elemento.region_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.region">@{{item.descripcion}}</option>
                  </select>
                </div>
              </div>

              <div class="col-md-12" >
                <div class="form-group">
        					<label>Carroceria</label>
        					<select class="form-control" name="atributos[]" :disabled="entidades.carroceria.length == 0" v-model="elemento.carroceria_id">
                    <option value="">Seleccione</option>
                    <option :value="item.id" v-for="item in entidades.carroceria">@{{item.descripcion}}</option>
                  </select>
        				</div>
      				</div>


            </div>
            {{-- Acordiones --}}
            <div class="col-md-4 accordion" >
              <v-collapse-wrapper class=" accordion" >
                <div style="margin:10px 15px" v-collapse-toggle>
                    <p>Carroceria</p>
                </div>
                <div style="width:100%;overflow-y: auto;" v-collapse-content >
                    <div  v-for="(item,key) in entidades.piezacarroceria" >
                      <div class="col-md-8 col-xs-8">
                        @{{item.descripcion}}
                      </div>
                      <div class="col-md-4 col-xs-4" style="margin-top:5px;">
                        <button class="btn btn-sm btn-info btn-flat" @click="anexarAtributo('piezacarroceria',key)"><i class="fas fa-check"></i></button>
                      </div>
                    </div>
                </div>
              </v-collapse-wrapper>
              <v-collapse-wrapper class=" accordion" >
                <div style="margin:10px 15px" v-collapse-toggle>
                    <p>Dirección</p>
                </div>
                <div style="width:100%;overflow-y: auto;" v-collapse-content >
                    <div  v-for="(item,key) in entidades.direccion" >
                      <div class="col-md-8 col-xs-8">
                        @{{item.descripcion}}
                      </div>
                      <div class="col-md-4 col-xs-4" style="margin-top:5px;">
                        <button class="btn btn-sm btn-info btn-flat" @click="anexarAtributo('direccion',key)"><i class="fas fa-check"></i></button>
                      </div>
                    </div>
                </div>
              </v-collapse-wrapper>
              <v-collapse-wrapper class=" accordion" >
                <div style="margin:10px 15px" v-collapse-toggle>
                    <p>Eléctrico</p>
                </div>
                <div style="width:100%;overflow-y: auto;" v-collapse-content >
                    <div  v-for="(item,key) in entidades.electrico" >
                      <div class="col-md-8 col-xs-8">
                        @{{item.descripcion}}
                      </div>
                      <div class="col-md-4 col-xs-4" style="margin-top:5px;">
                        <button class="btn btn-sm btn-info btn-flat" @click="anexarAtributo('electrico',key)"><i class="fas fa-check"></i></button>
                      </div>
                    </div>
                </div>
              </v-collapse-wrapper>
              <v-collapse-wrapper class=" accordion" >
                <div style="margin:10px 15px" v-collapse-toggle>
                    <p>Suspención</p>
                </div>
                <div style="width:100%;overflow-y: auto;" v-collapse-content >
                    <div  v-for="(item,key) in entidades.suspencion" >
                      <div class="col-md-8 col-xs-8">
                        @{{item.descripcion}}
                      </div>
                      <div class="col-md-4 col-xs-4" style="margin-top:5px;">
                        <button class="btn btn-sm btn-info btn-flat" @click="anexarAtributo('suspencion',key)"><i class="fas fa-check"></i></button>
                      </div>
                    </div>
                </div>
              </v-collapse-wrapper>
            </div>
            {{-- Partes seleccionadas --}}
            <div class="col-md-4 accordion" >
              <v-collapse-wrapper class=" accordion" >
                <div style="margin:10px 15px" >
                    <p>Partes Seleccionadas</p>
                </div>
                <div style="width:100%;overflow-y: auto;height:500px" >
                    <div  v-for="(item,key) in atributos" >
                      <div class="col-md-8 col-xs-8">
                        @{{item.descripcion}}
                      </div>
                      <div class="col-md-4 col-xs-4" style="margin-top:5px;">
                        <button class="btn btn-sm btn-danger btn-flat" @click.prevent="eliminarAtributo(key)"><i class="fas fa-trash"></i></button>
                      </div>
                    </div>
                </div>
              </v-collapse-wrapper>
            </div>
            {{-- Boton continuar --}}
            <div  class="col-md-12" style="margin-top:25px">
              <button type="button" class="btn btn-default hidden-xs"  @click="volver">Volver <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></button>
              <button type="submit" class="btn btn-primary hidden-xs pull-right" :disabled="deshabilitarBtnContinuar" @click.prevent="armarPiezas">Continuar <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></button>
            </div>
          </div>

          <div class="row" v-if="tipo == 2 && tab == 2">

            <div  class="col-md-12"  v-for="(item,key) in atributos">
              <div  class="col-md-12">
                <p><h3>@{{ item.descripcion }}</h3> <a  href="#" @click.prevent="eliminarAtributo(key)" class="text-danger">Eliminar</a></p>
              </div>
              <div class="col-md-2 col-xs-6" v-for="n in 4">
                <div class="col-md-12 col-xs-12">
                  <img :id="'imagen_' + item.id + '_' + key" src="../images/no-image.jpg" class="img-thumbnail" style="width:120px;height:89px"/>
                </div>
                <div class="col-md-12 col-xs-12 text-right">
                  <a  href="#" class="text-danger">Eliminar</a>
                </div>
              </div>


              <div class="col-md-12" style="margin-top:20px;">
                  Estado:&nbsp;&nbsp;&nbsp;
                  <div v-for="(dato,n) in entidades.estado"  style="display:inline">
                    <input type="radio" :key="dato.id" :value="dato.id" v-model="item.estado" >
                    <label for="1">@{{dato.descripcion}}</label>&nbsp;&nbsp;
                  </div>
              </div>
              <div class="col-md-12" style="margin-bottom:10px">
                  Lados:&nbsp;&nbsp;&nbsp;
                  <div v-for="(dato,n) in entidades.lado" style="display:inline">
                    <input type="checkbox" :value="dato.id" :key="dato.id" v-model="item.lado"/> @{{dato.descripcion}}&nbsp;&nbsp;&nbsp;
                  </div>
              </div>

              <div class="col-md-12 col-xs-12">
                <div class="form-group">
                  <label>Descripción</label>
                  <textarea class="form-control" v-model="item.observacion" :class="{'has-error' : item.observacion =='' }"></textarea>
                </div>
              </div>
              <div class="col-md-2 col-xs-12">
                <div class="form-group">
                  <label>Precio</label>
                  <input type="text" class="form-control"  v-model="item.monto" :class="{'has-error' : item.monto == '' }" onkeypress="return filterFloat(event,this);">
                </div>
              </div>

            </div>

            <div  class="col-md-12" style="margin-top:25px">
              <button type="button" class="btn btn-default hidden-xs"  @click="tab=1">Volver <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></button>
              <button class="btn btn-primary pull-right" :disabled="deshabilitarPublicarPieza" @click.prevent="publicarPieza">Publicar <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </fieldset>
    </div>
</form>
</div>
@push('scripts')
	<script type="text/javascript">

	</script>
  <script src="{{ asset('js/validaciones.js') }}"></script>
  <script src="{{ asset('js/publicar.js') }}"></script>

@endpush
@endsection
