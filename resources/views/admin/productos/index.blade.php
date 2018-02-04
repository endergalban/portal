@extends('layouts.app')

@section('content')
<div class="container" id="container">
    <!-- Usuarios -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Productos</div>
                <div class="panel-body">
                    <div class="alert alert-success" role="alert" v-show="mensajeOk != ''">
                    </div>
                    <div class="alert alert-danger" role="alert" v-show="mensajeError != ''">
                    </div>

             
                        <button @click.prevent="cargarElemento(-1);verificarCheck()" class="btn btn-success" :disabled="index > -2"><i class="fas fa-plus"></i> Nuevo Producto</button>
                    <hr>
                    <div class="row">
                      <div class="col-md-1"><b>ID #</b></div>
                      <div class="col-md-5"><b>Producto</b></div>
                      <div class="col-md-2"><b>Estado</b></div>
                      <div class="col-md-1"><b>Atributos</b></div>
                      <div class="col-md-2"><b>Acciones</b></div>
                    </div>
                    <hr>  
                    <div class="row" v-for = "(elemento, index) in elementos">
                      <div class="col-md-1">
                          <b>@{{ elemento.id }}</b>
                      </div>        
                      <div class="col-md-5">
                        @{{ elemento.descripcion }}
                      </div>        
                        
                      <div class="col-md-2">
                              <span v-if="elemento.estado == 1">Activo</span>
                              <span v-else>Inactivo</span>
                      </div>    
                     
                      <div class="col-md-1"> <button class="btn btn-success btn-sm" >@{{ elemento.atributos.length }}</button></div>        
                      <div class="col-md-2">
                        <button :id="'btn_editar' + index" @click.prevent="cargarElemento(index);verificarCheck()" class="btn btn-primary btn-sm" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" :disabled="cargando"><i class="fas fa-edit" data-toggle="tooltip" title="Editar" ></i></button>
                        <button :id="'btn_eliminar' + index" @click.prevent="eliminar(index)" class="btn btn-danger btn-sm" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" :disabled="cargando"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></button>
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


  <div class="row" v-show = "index > -2">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading" v-if="index > -1">@{{ elemento.descripcion}}</div>
        <div class="panel-heading" v-else>Nuevo producto</div>
            <div class="panel-body">

                <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                      <input type="text" v-model="elemento.descripcion" placeholder="Descripción de la entidad" style="width:100%" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <select class="form-control" style="width:100%" v-model="elemento.estado">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                      </select>
                    </div>
                  </div>
                </div>
                <hr>
                @foreach($entidades as $entidad)

                <div class="col-md-3">
                  <div class="col-md-12">
                    {{ $entidad->descripcion }}
                  </div>
                  <hr>
                  @foreach($entidad->atributos as $atributo)
                    <div class="col-md-10">
                      {{ $atributo->descripcion}}
                    </div>                  
                    <div class="col-md-2">
                    <input type="checkbox"  class="elementoAtributos" id="check_{{$atributo->id}}" name="atributos[]" value="{{ $atributo->id}}">
                    </div>
                  @endforeach
                </div>
                @endforeach

            </div>
            <div class="panel-footer">
              <button @click.prevent="guardar" class="btn btn-success" :disabled="elemento.descripcion == ''">Guardar</button>
              <button @click.prevent="limpiarElemento()" class="btn btn-default" >Cancelar</button>
            </div>
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
  <script src="{{ asset('js/productos.js') }}"></script>
@endpush
@endsection
