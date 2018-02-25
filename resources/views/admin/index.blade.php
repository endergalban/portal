@extends('layouts.app')

@section('content')
<div class="container" id="container">
    <!-- Usuarios -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="alert alert-success" role="alert" v-show="mensajeOk != ''">
                    </div>
                    <div class="alert alert-danger" role="alert" v-show="mensajeError != ''">
                    </div>
                     <button  @click="cargarElemento(-1)" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#guardarModal"><i class="fas fa-plus" data-toggle="tooltip" title="Nuevo" ></i></button>
                    <div class="table-responsive">
                        <table class="table .table-striped">
                          <thead>
                                <th>#</th>
                                <th>Email</th>
                                <th>Nombre</th>
                                <th>Rut</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr  v-for = "(elemento, index) in elementos">
                                <td>@{{ elemento.id }}</td>
                                <td>@{{ elemento.email }}</td>
                                <td>@{{ elemento.name }}</td>
                                <td>@{{ elemento.rut }}</td>
                                <td>
                                    <span class="text-success" v-if="elemento.estatus == 1">Activo</span>
                                    <span class="text-danger" v-else>Inactivo</span>
                                </td>
                                <td nowrap="nowrap">
                                    <a class="btn btn-primary btn-sm" href="{{route('users.edit',1)}}"><i class="fas fa-edit" data-toggle="tooltip" title="Editar"></i></a>
                                    <button @click="cargarElemento(index)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></button>

                                </td>
                            </tr>
                            </tbody>
                        </table>
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
    <!-- Modal Usuario -->
    <div class="modal fade" id="guardarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Datos de Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="col-md-6 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre" v-model="elemento.name">
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control" id="rut" placeholder="Rut" v-model="elemento.rut">
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="form-group">
                  <input type="email" class="form-control" id="email" placeholder="Email" v-model="elemento.email">
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                  <div class="form-group">
                    <input type="password" class="form-control" id="password" placeholder="Password" v-model="elemento.password">
                  </div>
                </div>
              <div class="col-md-6 col-xs-12">
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" v-model="elemento.estatus">
                    <label class="form-check-label" for="gridCheck">
                      Activo
                    </label>
                  </div>
                </div>
              </div>
              <input type="hidden" v-model="elemento.id">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-success" @click.prevent="guardar()" >Guardar</button>
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
            Esta seguro que desea eliminar el usuario @{{ elemento.name }} ?
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
  <script src="{{ asset('js/users.js') }}"></script>
@endpush
@endsection
