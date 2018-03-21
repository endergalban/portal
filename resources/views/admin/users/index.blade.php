@extends('layouts.app')

@section('content')
<div class="container hidden" id="container">
  <fieldset class="scheduler-border">
    <legend class="scheduler-border"><span class="title-estilo">Usuarios</span></legend>
    <div class="alert alert-danger" role="alert" v-show="mensajeError != ''">
    @{{ mensajeError }}
    </div>
    {{-- Filtros --}}
    <div class="col-md-12 col-xs-12">
      <fieldset class="scheduler-border">
        <legend class="scheduler-border"><span class="title-estilo"></span></legend>
        <div class="col-md-3 col-xs-12">
          <div class="form-group">
            <select v-model="estatusFiltro" class="form-control" >
              <option value="">Estado</option>
              <option value="1">Activo</option>
              <option value="0">Inactivo</option>
            </select>
          </div>
        </div>
        <div class="col-md-3 col-xs-12">
          <div class="form-group">
            <select v-model="tipoFiltro" class="form-control" >
              <option value="">Tipo</option>
              <option value="1">Administrador</option>
              <option value="0">Usuario</option>
            </select>
          </div>
        </div>
        <div class="col-md-3 col-xs-12">
          <div class="form-group">
            <input type="text" v-model="buscarFiltro" placeholder="Ingresar busqueda..." class="form-control">
          </div>
        </div>
        <div class="col-md-3 col-xs-12">
          <div class="form-group">
            <div class="pull-right">
              <button class="btn btn-primary" @click="filtrar()">Filtrar</button>
              <button @click.prevent="cargarElemento(-1);" class="btn btn-primary" :disabled="index > -2">Nuevo Usuario</button>
            </div>
          </div>
        </div>
      </fieldset>
    </div>
    {{-- Nuevo Usuario --}}
    <div class="col-md-12"  v-if="index > -2" id="NuevoElemento">
        {{-- <div class="panel panel-default">
        <div class="panel-heading" v-if="index > -1">@{{ elemento.name}} - @{{ elemento.rut}}</div>
        <div class="panel-heading" v-else>Nuevo usuario</div> --}}
      <hr>
      <form>
        <div class="col-md-4 col-xs-12">
          <div class="form-group">
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del usuario" v-model="elemento.name">
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="form-group">
            <input type="text" class="form-control" id="lastname" placeholder="Apellido del usuario" v-model="elemento.lastname">
          </div>
        </div>
        <div class="col-md-2 col-xs-12">
          <div class="form-group">
            <input type="text" class="form-control" id="rut" placeholder="########-#" v-model="elemento.rut">
          </div>
        </div>
        <div class="col-md-2 col-xs-12">
          <div class="form-group">
            <input type="text" class="form-control" id="telefono" placeholder="###-#########" v-model="elemento.telefono">
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="form-group">
            <input type="email" class="form-control" id="email" placeholder="ejemplo@ejemplo.com" v-model="elemento.email">
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="form-group">
            <input type="password" class="form-control" id="password" placeholder="**********" v-model="elemento.password">
          </div>
        </div>
        <div class="col-md-2 col-xs-12">
          <div class="form-group">
            <select v-model="elemento.tipo" style="width:100%" class="form-control">
              <option value="0">Usuario</option>
              <option value="1">Administrador</option>
            </select>
          </div>
        </div>
        <div class="col-md-2 col-xs-12">
          <div class="form-group">
            <select v-model="elemento.estatus" style="width:100%" class="form-control">
              <option value="1">Activo</option>
              <option value="0">Inactivo</option>
            </select>
          </div>
        </div>
        <div class="col-md-3 col-xs-12">
          <div class="form-group">
            <select v-model="elemento.region_id" style="width:100%" class="form-control">
              <option value="">Región</option>
              @foreach($regiones as $region)
                <option value="{{ $region->id }}">{{ $region->descripcion }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-9 col-xs-12">
          <div class="form-group">
            <input type="text" class="form-control" id="direccion" placeholder="Dirección" v-model="elemento.direccion">
          </div>
        </div>
        <div class="col-md-12 col-xs-12">
          <div class="form-group">
            <button type="button" class="btn btn-primary" @click.prevent="guardar()" :disabled="habilitarGuardar" >Guardar</button>
            <button type="button" class="btn btn-default" @click.prevent="limpiarElemento()">Cancelar</button>
          </div>
        </div>
        <input type="hidden" v-model="elemento.id">
      </form>
    </div>
    {{-- Listado --}}
    <div class="col-md-12 col-xs-12">
        <hr>
        <div class="table-responsive">
          <table class="table .table-striped">
            <thead>
            <tr>
              <th nowrap="nowrap">ID #</th>
              <th>Email</th>
              <th>Tipo</th>
              <th>Nombre y Apellido</th>
              <th>Rut</th>
              <th>Teléfono</th>
              <th class="text-center">Estatus</th>
              <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
              <tr  v-for = "(elemento, index) in elementos">
                <td class="text-center"><b>@{{ elemento.id }}</b></td>
                <td>@{{ elemento.email }}</td>
                <td>
                  <span v-if="elemento.tipo == 1">Administrador</span>
                  <span v-else>Usuario</span>
                </td>
                <td>@{{ elemento.name }} @{{ elemento.lastname }}</td>
                <td>@{{ elemento.rut }}</td>
                <td>@{{ elemento.telefono }}</td>
                <td class="text-center">
                  <span class="text-success" v-if="elemento.estatus == 1">Activo</span>
                  <span class="text-danger" v-else>Inactivo</span>
                </td>
                <td class="text-center" nowrap="nowrap">
                  <button @click="cargarElemento(index)" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#guardarModal"><i class="fas fa-edit" data-toggle="tooltip" title="Editar"></i></button>
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
                <a href="#" class="page-link" @click.prevent="cambioPagina(numeroPagina)">@{{numeroPagina}}</a>
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
  </fieldset>
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
          Esta seguro que desea eliminar el usuario ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" @click="limpiarElemento()">Cancelar</button>
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
