@extends('layouts.app')

@section('content')
<div class="container hidden" id="container">
  <fieldset class="scheduler-border">
    <legend class="scheduler-border"><span class="title-estilo">Caracteristicas</span></legend>
    {{-- Mensajes --}}
    <div class="alert alert-success" role="alert" v-show="mensajeOk != ''"></div>
    <div class="alert alert-danger" role="alert" v-show="mensajeError != ''"></div>
    <!-- Entidades -->
    <div class="col-md-12">
      <fieldset class="scheduler-border">
        <legend class="scheduler-border"></legend>
          <button @click.prevent="cargarElementoEntidad(-1)" class="btn btn-primary" :disabled="index > -2"><i class="fas fa-plus"></i> Nueva Caracteristica</button>
      </fieldset>
        <!--Nueva Entidad-->
        <div class="col-md-12" v-show="index > -2">
          <hr>
          <form>
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
            <div class="col-md-2">
              <div class="form-group">
                <select class="form-control" v-model="elementoEntidad.tipo" style="width:100%"/>
                  <option value="1">Selección simple</option>
                  <option value="2">Selección multiple</option>
                  <option value="3">Caja de texto</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <button type="button" class="btn btn-primary" @click.prevent="guardarElementoEntidad()" :disabled="habilitarGuardarEntidad" >Guardar</button>
                <button type="button" class="btn btn-default" @click.prevent="limpiarElementoEntidad()">Cancelar</button>
              </div>
            </div>
          </form>
        </div>
        {{-- Listado --}}
        <div class="col-md-12">
          <hr>
          <div class="table-responsive">
            <table class="table .table-striped">
              <thead>
                <th><b>ID #</b></th>
                <th><b>Caracteristica</b></th>
                <th><b>Orden</b></th>
                <th><b>Estado</b></th>
                <th><b>Tipo</b></th>
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
                      <span class="label label-info" v-if="elemento.tipo == 1">Selección Simple</span>
                      <span class="label label-info" v-if="elemento.tipo == 2">Selección Multiple</span>
                      <span class="label label-info" v-if="elemento.tipo == 3">Caja de Texto</span>
                  </td>
                  <td>
                       <button @click="cargarElementoEntidadAtributo(index,1)" class="btn btn-primary btn-sm">@{{ elemento.atributos.length }}</button>
                  </td>
                  <td>
                       <button @click="cargarElementoEntidad(index)" class="btn btn-primary btn-sm"><i class="fas fa-edit" data-toggle="tooltip" title="Editar"></i></button>
                       <button @click="cargarElementoEntidad(index)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModalEntidad"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <nav aria-label="Page navigation" v-show="numeroPaginas.length > 1">
          <ul class="pagination">
            <li class="page-item" v-show="paginaVisible > 1">
              <a class="page-link" href="#" aria-label="Previous" @click.prevent="cambioPagina(paginaVisible - 1)">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Anterior</span>
              </a>
            </li>

            <li class="page-item" v-for="numeroPagina in numeroPaginas" v-bind:class="{ active: (numeroPagina==paginaVisible) }">
                <a href="#" class="page-link" @click="cambioPagina(numeroPagina)">@{{numeroPagina}}</a>
            </li>

            <li class="page-item"  v-show="paginaVisible < numeroPaginas.length">
              <a class="page-link" href="#" aria-label="Next" @click.prevent="cambioPagina(paginaVisible + 1)">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Siguiente</span>
              </a>
            </li>
          </ul>
        </nav>
        </div>
    </div>
    <!--Atributos-->
    <div class="col-md-12" v-show="desplegarAtributos"  id="divEdicion">
      <hr>
      <span><b>Items de @{{ elementoAtributo.entidad_descripcion }} ( @{{ cantidadAtributos }}  )</b></span>
      <fieldset class="scheduler-border">
        <legend class="scheduler-border"></legend>
        <button @click.prevent="cargarElementoAtributo(indexEntidadAtributo,'-1')" class="btn btn-primary" :disabled="indexAtributo > -2"><i class="fas fa-plus"></i> Nuevo Item</button>
      </fieldset>
      <!--Nueva Atributo-->
      <div class="col-md-12" v-show="indexAtributo > -2">
        <hr>
        <form>
        <div class="col-md-8">
          <div class="form-group">
            <input type="text" v-model="elementoAtributo.descripcion" value="" placeholder="Descripción" style="width:100%" class="form-control">
          </div>
        </div>
        <div class="col-md-2">
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
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" v-model="atributoPadreDescripcion" value="0" style="width:100%" class="form-control" disabled>
          </div>
        </div>
        <div class="col-md-2">
          <button class="btn  btn-flat btn-sm btn-primary" @click.prevent="ventanaAtributoPadre()">Atributo Padre</button>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <button type="button" class="btn btn-primary" @click.prevent="guardarElementoAtributo()" :disabled="habilitarGuardarAtributo" >Guardar</button>
            <button type="button" class="btn btn-default" @click.prevent="limpiarElementoAtributo()">Cancelar</button>
          </div>
        </div>
      </form>
      </div>
      {{-- Listado de Atributos --}}
      <div class="col-md-12">
        <hr>
        <div class="table-responsive">
          <table class="table .table-striped">
            <thead>
              <th><b>ID #</b></th>
              <th><b>Item</b></th>
              <th><b>Orden</b></th>
              <th><b>Padre</b></th>
              <th><b>Estado</b></th>
              <th><b>Acciones</b></th>
            </thead>
            <tbody>
            <tr  v-for = "(elementoAtt, index) in atributos">
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
                @{{ elementoAtt.atributo_padre ?  elementoAtt.atributo_padre.entidad.descripcion + ' > ' + elementoAtt.atributo_padre.descripcion : 'N/A'}}
              </td>
              <td>
                <span class="label label-success" v-if="elementoAtt.estado == 1">Activo</span>
                <span class="label label-danger" v-if="elementoAtt.estado == 0">Inactivo</span>
              </td>
              <td>
                <button @click.prevent="cargarElementoAtributo(indexEntidadAtributo,index)" class="btn btn-primary btn-sm"><i class="fas fa-edit" data-toggle="tooltip" title="Editar"></i></button>
                <button @click.prevent="cargarElementoAtributo(indexEntidadAtributo,index)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModalAtributo"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></button>
              </td>
            </tr>
          </tbody>
          </table>
        </div>
        <nav aria-label="Page navigation" v-show="numeroPaginas2.length > 1">
        <ul class="pagination">
          <li class="page-item" v-show="paginaVisible2 > 1">
            <a class="page-link" href="#" aria-label="Previous" @click.prevent="cambioPagina2(indexEntidadAtributo,paginaVisible2 - 1)">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Anterior</span>
            </a>
          </li>

          <li class="page-item" v-for="numeroPagina in numeroPaginas2" v-bind:class="{ active: (numeroPagina==paginaVisible2) }">
              <a href="#" class="page-link" @click.prevent="cambioPagina2(indexEntidadAtributo,numeroPagina)">@{{numeroPagina}}</a>
          </li>

          <li class="page-item"  v-show="paginaVisible2 < numeroPaginas2.length">
            <a class="page-link" href="#" aria-label="Next" @click.prevent="cambioPagina2(indexEntidadAtributo,paginaVisible2 + 1)">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Siguiente</span>
            </a>
          </li>
        </ul>
      </nav>
      </div>
    </div>
  </fieldset>
  <!-- Modal Padre -->
  <div class="modal fade" id="modalAtributoPadre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Carga Atributo Padre</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Entidad</label>
                <select id="entidadPadre" v-model="entidadPadre" class="form-control" @change="cargarAtributosPadre">
                  <option value="">Seleccione</option>
                  @foreach ($entidadesPadre as $key => $value)
                    <option value="{{$value->id}}">{{$value->descripcion}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Atributo Padre</label>
                <select id="atributoPadre" v-model="atributoPadre" class="form-control">
                  <option value="">Seleccione</option>
                  <option v-for="item in atributosPadre":value="item.id">@{{ item.descripcion }}</option>
                </select>
              </div>
            </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" @click="cerrarVentanaAtributoPadre(0)">Cerrar</button>
          <button type="button" class="btn btn-primary" @click="cerrarVentanaAtributoPadre(1)">Seleccionar</button>
        </div>
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
          <button type="button" class="btn btn-primary" @click.prevent="eliminarElementoEntidad()">Aceptar</button>
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
            <button type="button" class="btn btn-primary" @click.prevent="eliminarElementoAtributo()">Aceptar</button>
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
