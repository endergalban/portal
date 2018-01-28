@extends('layouts.app')

@section('content')
<div class="container" id="container">
    <!-- Usuarios -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Entidades</div>
                <div class="panel-body">
                    <div class="alert alert-success" role="alert" v-show="mensajeOk != ''">
                    </div>
                    <div class="alert alert-danger" role="alert" v-show="mensajeError != ''">
                    </div>
                    <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <input type="text" id="entidad_descripcion_nuevo" value="" placeholder="Descripción de la entidad" style="width:100%" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-1">
                        <div class="form-group">
                           <input type="text" id="entidad_orden_nuevo" value="0" style="width:100%" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <select class="form-control" :id="'entidad_estado_nuevo'" style="width:100%"/>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                          </select>
                        </div>
                      </div>
                      <input type="hidden" id="entidadpadre_id_nuevo" value="0">
                      <div class="col-md-2">
                          <button :id="'btn_guardar_entidad_nuevo'" @click.prevent="guardar('nuevo')" class="btn btn-success" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" :disabled="cargando"><i class="fas fa-plus"></i></button>
                      </div>
                    </div>
                    <hr>  
                    <div class="row">
                      <div class="col-md-1"><b>ID #</b></div>
                      <div class="col-md-5"><b>Entidad</b></div>
                      <div class="col-md-1"><b>Orden</b></div>
                      <div class="col-md-2"><b>Estado</b></div>
                      <div class="col-md-1"><b>Atributos</b></div>
                      <div class="col-md-2"><b>Acciones</b></div>
                    </div>
                    <hr>  
                    <div class="row" v-for = "(elemento, index) in elementos">
                      <div class="col-md-1">
                        <div class="form-group">
                          @{{ elemento.id }}
                        </div>
                      </div>        
                      <div class="col-md-5">
                        <div class="form-group">
                          <input type="text" :id="'entidad_descripcion_' + index" :value="elemento.descripcion"  style="width:100%"/>
                        </div>
                      </div>        
                      <div class="col-md-1">
                        <div class="form-group">
                          <input type="text" :id="'entidad_orden_' + index" :value="elemento.orden"  style="width:100%"/>
                        </div>
                      </div>        
                      <div class="col-md-2">
                         <div class="form-group">
                            <select :id="'entidad_estado_' + index"  style="width:100%"/> 
                              <option value="1" selected v-if="elemento.estado == 1">Activo</option>
                              <option value="1" v-else>Activo</option>
                              <option value="0" selected v-if="elemento.estado == 0">Inactivo</option>
                              <option value="0" v-else>Inactivo</option>
                            </select>
                        </div>
                      </div>    
                      <input type="hidden" :id="'entidadpadre_id_' + index" :value="elemento.id">    
                      <div class="col-md-1"> <button @click="cargarElemento(index)" class="btn btn-success btn-sm" >@{{ elemento.atributos.length }}</button></div>        
                      <div class="col-md-2">
                        <button :id="'btn_editar_entidad_' + index" @click.prevent="guardar(index)" class="btn btn-primary btn-sm" data-loading-text="<i class='fa fa-spinner fa-spin '></i>"><i class="fas fa-edit" data-toggle="tooltip" title="Editar" :disabled="cargando"></i></button>
                        <button :id="'btn_eliminar_entidad_' + index" @click.prevent="eliminar(index)" class="btn btn-danger btn-sm" data-loading-text="<i class='fa fa-spinner fa-spin '></i>"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar" :disabled="cargando" ></i></button>
                      </div>
                      <hr>        
                    </div>

                    <nav aria-label="Page navigation" v-show="mostrarPaginador">
                      <ul class="pagination">
                        <li class="page-item" :disabled="paginador.current_page == 1">
                          <a class="page-link" href="#" aria-label="Previous" @click.prevent="cambioPagina(paginador.current_page - 1)">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Anterior</span>
                          </a>
                        </li>
                        
                        <li class="page-item" v-for="numeroPagina in numeroPaginas" v-bind:class="{ active: (numeroPagina==paginador.current_page) }">
                            <a href="#" class="page-link" @click="cambioPagina(numeroPagina)">@{{numeroPagina}}</a>
                        </li>

                        <li class="page-item"  :disabled="paginador.current_page < paginador.last_page">
                          <a class="page-link" href="#" aria-label="Next" @click.prevent="cambioPagina(paginador.current_page + 1)">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Siguiente</span>
                          </a>
                        </li>
                      </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>


    <div class="row" v-if="elemento.id > 0">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@{{ elemento.descripcion }}</div>
                <div class="panel-body">
                    <div class="row">
                      
                      <div class="col-md-7">
                        <div class="form-group">
                          <input class="form-control" type="text" :id="'descripcion_nuevo'" value="" style="width:100%" placeholder="Descripción del atributo"/></div>
                        </div>
                      <div class="col-md-1">
                        <div class="form-group">
                          <input class="form-control" type="text" :id="'orden_nuevo'" value="0" style="width:100%"/></div>
                        </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <select class="form-control" :id="'estado_nuevo'" style="width:100%"/>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2"> 
                        <button :id="'btn_editar_atributo_nuevo'" @click.prevent="guardarAtributo('nuevo')" class="btn btn-success" :disabled="cargando" data-loading-text="<i class='fa fa-spinner fa-spin '></i>"><i class="fas fa-plus" data-toggle="tooltip" title="Agregar" ></i></button>
                      </div>
                      <input type="hidden" id="entidad_id" v-model="elemento.id">
                      <input type="hidden" id="id_nuevo" value="0">
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-1"><b>ID #</b></div>
                      <div class="col-md-6"><b>Atributo</b></div>
                      <div class="col-md-1"><b>Orden</b></div>
                      <div class="col-md-2"><b>Estado</b></div>
                      <div class="col-md-2"><b>Acciones</b></div>
                    </div>
                    <hr>

                    <div  class="row" v-for = "(elemento, index) in elemento.atributos">
                      <div class="col-md-1"><b>@{{ elemento.id }}</b></div>
                      <div class="col-md-6">
                        <div class="form-group">
                        <input type="text" :id="'descripcion_' + index" :value="elemento.descripcion" style="width:100%"/>
                        </div>
                      </div>
                      <div class="col-md-1">
                        <div class="form-group">
                          <input type="text" :id="'orden_' + index" :value="elemento.orden"  style="width:100%"/>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <select :id="'estado_' + index"  style="width:100%"/> 
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                          </select>
                        </div>
                      </div>
                      <input type="hidden" :id="'id_' + index" :value="elemento.id">
                      <div class="col-md-2">
                        <button :id="'btn_editar_atributo_' + index" @click.prevent="guardarAtributo(index)" class="btn btn-primary btn-sm" :disabled="cargando" data-loading-text="<i class='fa fa-spinner fa-spin '></i>"><i class="fas fa-edit" data-toggle="tooltip" title="Editar" ></i></button>
                        <button :id="'btn_eliminar_atributo_' + index" @click.prevent="eliminarAtributo(index)" class="btn btn-danger btn-sm" :disabled="cargando" data-loading-text="<i class='fa fa-spinner fa-spin '></i>"><i class="fas fa-times" data-toggle="tooltip" title="Eliminar" ></i></button>
                      </div>
                      <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal Eliminar -->
    <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Esta seguro que desea eliminar?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-success" @click.prevent="eliminarElemento()">Aceptar</button>
          </div>
        </div>
      </div>
    </div>
</div>
@push('scripts')
  <script src="{{ asset('js/validaciones.js') }}"></script>
  <script src="{{ asset('js/atributos.js') }}"></script>
@endpush
@endsection
