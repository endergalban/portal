@extends('layouts.app')

@section('content')
<div class="container" id="container">
    <!-- Usuarios -->
    <div class="row">
        <div class="col-md-12">
             <fieldset class="scheduler-border">
              <legend class="scheduler-border"><span class="title-estilo">Modificar Usuario</span></legend>
            @if(Session::has('success'))
              <div class="alert alert-success">
                  {{ Session::get('success') }}
                  @php
                  Session::forget('success');
                  @endphp
              </div>
              @endif
                  <form class="form-horizontal" method="POST" action="{{route('users.update', $user->id)}}">

                        {{ csrf_field() }}

                         <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                         <label for="rut" class="col-md-4 control-label">Rut</label>
                            <div class="col-md-4">
                                <input id="rut" type="text" class="form-control" name="rut" value="{{ $user->rut}}"  autofocus>

                                @if ($errors->has('rut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email}}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('region_idl') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Región</label>

                            <div class="col-md-4">
                              <select id="region_id"  class="form-control" name="region_id" value="{{ old('region_id') }}" required>
                                  <option value="{{ $user->region->id}}">{{$user->region->descripcion}}</option>
                                  @foreach(App\Atributo::where('entidad_id',1)->where('estado',1)->get() as $region)
                                    <option value="{{ $region->id }}">{{ $region->descripcion }}</option>
                                  @endforeach
                              </select>
                                @if ($errors->has('region_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('region_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                          <label for="telefono" class="col-md-4 control-label">Teléfono</label>

                          <div class="col-md-4">
                            <input id="telefono" type="text" class="form-control" name="telefono" value="{{ $user->telefono }}"  autofocus>

                            @if ($errors->has('telefono'))
                            <span class="help-block">
                              <strong>{{ $errors->first('telefono') }}</strong>
                            </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">Dirección</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ $user->direccion }}"  autofocus>

                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-4">
                                 <input id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <button  class="btn btn-primary">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
        </fieldset>
      </div>
  </div>
</div>
@endsection
