@extends('layouts.app')

@section('content')
<div class="container hidden" id="container">
  <fieldset class="scheduler-border">
    <legend class="scheduler-border"><span class="title-estilo">Productos</span></legend>
    <!-- Errores -->
    <div class="alert alert-success" role="alert" v-show="mensajeOk != ''">
    </div>
    <div class="alert alert-danger" role="alert" v-show="mensajeError != ''">
    </div>
    <div class="col-md-12 col-xs-12">
      <fieldset class="scheduler-border">
        <legend class="scheduler-border"></legend>
        <button @click.prevent="cargarElemento(-1);verificarCheck()" class="btn btn-primary" :disabled="index > -2"><i class="fas fa-plus"></i> Nuevo Producto</button>
      </fieldset>
    </div>
    {{-- Nuevo Producto --}}
    <div class="col-md-12 col-xs-12" v-show = "index > -2">
      <hr>
      <div class="col-md-10 col-xs-12">
        <div class="form-group">
          <input type="text" v-model="elemento.descripcion" placeholder="Descripción de la entidad" style="width:100%" class="form-control">
        </div>
      </div>
      <div class="col-md-2 col-xs-12">
        <div class="form-group">
          <select class="form-control" style="width:100%" v-model="elemento.estado">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
          </select>
        </div>
      </div>
    </div>
    {{-- Elemetos del producto --}}
    <div class="col-md-12 col-xs-12" v-show = "index > -2">
      <hr>
      @foreach($entidades as $entidad)
        <div class="col-md-3 col-xs-12" style="margin-top:20px;margin-bottom:20px;">
          <div class="col-md-10 col-xs-8">
            <b>{{ $entidad->descripcion }}</b>
          </div>
          <div class="col-md-2 col-xs-4">
            <input type="checkbox" id="check_{{$entidad->id}}" @click="marcarTodos('{{ $entidad->id }}')">
          </div>
          <hr>
          <div style="overflow-y:auto; height:150px">
            @foreach($entidad->atributos as $atributo)
              <div class="col-md-10 col-xs-8">
                {{ $atributo->descripcion}}
              </div>
              <div class="col-md-2 col-xs-4">
                <input type="checkbox"  class="elementoAtributos entidad_{{ $entidad->id }}" name="atributos[]" value="{{ $atributo->id}}">
              </div>
            @endforeach
          </div>
        </div>
      @endforeach
    </div>
    {{-- Boton Guardar --}}
    <div class="col-md-12 col-xs-12" v-show = "index > -2">
      <hr>
      <button @click.prevent="guardar" class="btn btn-primary" :disabled="elemento.descripcion == ''">Guardar</button>
      <button @click.prevent="limpiarElemento()" class="btn btn-default" >Cancelar</button>
    </div>
    {{-- Listado de Productos --}}
    <div class="col-md-12 col-xs-12">
      <hr>
      <div class="table-responsive">
        <table class="table .table-striped">
          <thead>
          <tr>
            <th><b>ID #</b></th>
            <th><b>Producto</b></th>
            <th><b>Estado</b></th>
            <th><b>Atributos</b></th>
            <th><b>Acciones</b></th>
          </tr>
          </thead>
         <tbody>
          <tr v-show="elementos.length == 0"><td colspan="5">N existen productos configurados</td></tr>
          <tr v-for = "(elemento, index) in elementos">
            <td>
                <b>@{{ elemento.id }}</b>
            </td>
            <td>
              @{{ elemento.descripcion }}
            </td>
            <td>
              <span v-if="elemento.estado == 1">Activo</span>
              <span v-else>Inactivo</span>
            </td>
            <td><b>@{{ elemento.atributos.length }}</b></td>
            <td nowrap="nowrap">
              <button :id="'btn_editar' + index" @click.prevent="cargarElemento(index);verificarCheck()" class="btn btn-primary btn-sm" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" :disabled="cargando"><i class="fas fa-edit" data-toggle="tooltip" title="Editar" ></i></button>
              <button :id="'btn_eliminar' + index" @click.prevent="eliminar(index)" class="btn btn-danger btn-sm" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" :disabled="cargando"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></button>
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
  <fieldset>
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
          <button type="button" class="btn btn-primary" @click.prevent="eliminarElemento()">Aceptar</button>
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
