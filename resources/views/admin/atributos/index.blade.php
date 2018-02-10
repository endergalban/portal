@extends('layouts.app')

@section('content')
<div class="container" id="container">
    <div class="alert alert-success" role="alert" v-show="mensajeOk != ''">
    </div>
    <div class="alert alert-danger" role="alert" v-show="mensajeError != ''">
    </div>
    <!-- Entidades -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Caracteristicas</div>
                <div class="panel-body">
                  <button @click.prevent="cargarElementoEntidad(-1)" class="btn btn-success" :disabled="index > -2"><i class="fas fa-plus"></i> Nueva Caracteristica</button>
                  <hr>
                  <div class="table-responsive">
                  <table class="table .table-striped">
                    <thead>
                      <th><b>ID #</b></th>
                      <th><b>Caracteristica</b></th>
                      <th><b>Orden</b></th>
                      <th><b>Estado</b></th>
                      <th><b>Items</b></th>
                      <th><b>Acciones</b></th>
                    </thead>
                    <tbody>
                      <tr  v-for = "(elemento, index) in elementos">
                        <td>
                            <b>@{{ elemento.id }}</b>
                        </td>        
                        <td>
                           @{{elemento.descripcion}}
                        </td>        
                        <td>        
                            @{{ elemento.orden }}
                        </td> 
                        <td>        
                            <span class="label label-success" v-if="elemento.estado == 1">Activo</span>
                            <span class="label label-danger" v-if="elemento.estado == 0">Inactivo</span>
                        </td>       
                        <td>        
                             <button @click="cargarElementoEntidadAtributo(index)" class="btn btn-primary btn-sm">@{{ elemento.atributos.length }}</button>
                        </td>  
                        <td>        
                             <button @click="cargarElementoEntidad(index)" class="btn btn-primary btn-sm"><i class="fas fa-edit" data-toggle="tooltip" title="Editar"></i></button>
                             <button @click="cargarElementoEntidad(index)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModalEntidad"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></button>
                        </td>       
                      </tr>
                    </tbody>
                  </table>
                </div>
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
    <!--Nueva Entidad-->
    <div v-show="index > -2">
      <div class="col-md-12">
          <div class="panel panel-default">
          <div class="panel-heading" v-if="index > -1">@{{ elementoEntidad.descripcion}} </div>
          <div class="panel-heading" v-else>Nueva Caracteristica</div>

            <form>
            <div class="panel-body">

                   <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <input type="text" v-model="elementoEntidad.descripcion" value="" placeholder="Descripción" style="width:100%" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-1">
                        <div class="form-group">
                           <input type="text" v-model="elementoEntidad.orden" value="0" style="width:100%" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <select class="form-control" v-model="elementoEntidad.estado" style="width:100%"/>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                          </select>
                        </div>
                      </div>
                </div>
         
            </div>
            <div class="panel-footer">
              <button type="button" class="btn btn-success" @click.prevent="guardarElementoEntidad()" :disabled="habilitarGuardarEntidad" >Guardar</button>
              <button type="button" class="btn btn-default" @click.prevent="limpiarElementoEntidad()">Cancelar</button>
            </div>
            </form>
        </div>
      </div>
    </div>    

    <!--Atributos-->
    <div v-if="indexEntidadAtributo > -1">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Items de @{{ elementos[indexEntidadAtributo].descripcion }} ( @{{ elementos[indexEntidadAtributo].atributos.length }}  )</div>
                <div class="panel-body">
                    <button @click.prevent="cargarElementoAtributo(indexEntidadAtributo,'-1')" class="btn btn-success" :disabled="indexAtributo > -2"><i class="fas fa-plus"></i> Nuevo Item</button>
                    <hr>
                    <div class="table-responsive">
                    <table class="table .table-striped">
                      <thead>
                        <th><b>ID #</b></th>
                        <th><b>Item</b></th>
                        <th><b>Orden</b></th>
                        <th><b>Estado</b></th>
                        <th><b>Acciones</b></th>
                      </thead>
                      <tbody>
                        <tr  v-for = "(elementoAtt, index) in elementos[indexEntidadAtributo].atributos">
                          <td>
                              <b>@{{ elementoAtt.id }}</b>
                          </td>        
                          <td>
                             @{{elementoAtt.descripcion}}
                          </td>        
                          <td>        
                              @{{ elementoAtt.orden }}
                          </td> 
                          <td>        
                              <span class="label label-success" v-if="elementoAtt.estado == 1">Activo</span>
                              <span class="label label-danger" v-if="elementoAtt.estado == 0">Inactivo</span>
                          </td>       
                          <td>        
                               <button @click="cargarElementoAtributo(indexEntidadAtributo,index)" class="btn btn-primary btn-sm"><i class="fas fa-edit" data-toggle="tooltip" title="Editar"></i></button>
                               <button @click="cargarElementoAtributo(indexEntidadAtributo,index)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModalAtributo"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></button>
                          </td>       
                        </tr>
                      </tbody>
                    </table>
                  </div>
                      
                  
                </div>
            </div>
        </div>
    </div>
    <!--Nueva Atributo-->
    <div v-show="indexAtributo > -2">
      <div class="col-md-12">
          <div class="panel panel-default">
          <div class="panel-heading" v-if="index > -1">@{{ elementoAtributo.descripcion}} </div>
          <div class="panel-heading" v-else>Nuevo Item</div>

            <form>
            <div class="panel-body">

                   <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <input type="text" v-model="elementoAtributo.descripcion" value="" placeholder="Descripción" style="width:100%" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-1">
                        <div class="form-group">
                           <input type="text" v-model="elementoAtributo.orden" value="0" style="width:100%" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <select class="form-control" v-model="elementoAtributo.estado" style="width:100%"/>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                          </select>
                        </div>
                      </div>
                </div>
         
            </div>
            <div class="panel-footer">
              <button type="button" class="btn btn-success" @click.prevent="guardarElementoAtributo()" :disabled="habilitarGuardarAtributo" >Guardar</button>
              <button type="button" class="btn btn-default" @click.prevent="limpiarElementoAtributo()">Cancelar</button>
            </div>
            </form>
        </div>
      </div>
    </div> 

    <!-- Modal Eliminar -->
    <div class="modal fade" id="eliminarModalEntidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <button type="button" class="btn btn-success" @click.prevent="eliminarElementoEntidad()">Aceptar</button>
          </div>
        </div>
      </div>
    </div>

     <!-- Modal Eliminar Atributo-->
    <div class="modal fade" id="eliminarModalAtributo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <button type="button" class="btn btn-success" @click.prevent="eliminarElementoAtributo()">Aceptar</button>
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
