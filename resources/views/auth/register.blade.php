@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           <fieldset class="scheduler-border">
              <legend class="scheduler-border"><span class="title-estilo">Registro</span></legend>
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                         <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                         <label for="rut" class="col-md-4 control-label">Rut</label>
                            <div class="col-md-6">
                                <input id="rut" type="text" onblur="verificar()" class="form-control" name="rut" value="{{ old('rut') }}" placeholder="##.###.####-#" required>

                                @if ($errors->has('rut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombres</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Escribe tu nombre" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Apellidos</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" placeholder="Escribe tu apellido" required>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="ejemplo@ejemplo.cl" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email-confirm') ? ' has-error' : '' }}">
                            <label for="email_confirmation" class="col-md-4 control-label">Confirmar E-Mail</label>
                            <div class="col-md-6">
                                <input id="email_confirmation" type="email" class="form-control" name="email_confirmation" value="{{ old('email_confirmation') }}" placeholder="ejemplo@ejemplo.cl" required>
                                @if ($errors->has('email_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            <label for="telefono" class="col-md-4 control-label">Teléfono</label>
                            <div class="col-md-6">
                                <input id="telfono" type="name" class="form-control" name="telefono" value="{{ old('telefono') }}" placeholder="###-#########">
                                @if ($errors->has('telefono'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('region_idl') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Región</label>

                            <div class="col-md-6">
                              <select id="region_id"  class="form-control" name="region_id" value="{{ old('region_id') }}" required>
                                  <option value="">Seleccione</option>
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

                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">Dirección</label>
                            <div class="col-md-6">
                                <input id="direccion" type="name" class="form-control" name="direccion" value="{{ old('direccion') }}" placeholder="Ingrese tu dirección" >
                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrarte
                                </button>
                            </div>
                        </div>
                    </form>
                    </fieldset>
        </div>
    </div>
</div>

<script src="{{ asset('js/validaciones.js') }}"></script>
<script>
function verificar(){

    document.getElementById("rut").parentElement.parentElement.classList.remove('has-error');
    var rut = document.getElementById("rut").value;
    rut = rut.replace(new RegExp('[.]', 'g'),'');
    rut = rut.replace(new RegExp('[-]', 'g'),'');
    if ( validaRut(rut)) {
        var numero = new Intl.NumberFormat('de-DE').format((rut.substr(0, rut.length - 1)));
    	var dv = (rut.substr(rut.length - 1)).toLowerCase();
    	document.getElementById("rut").value = numero + '-' + dv;
    } else {
        document.getElementById("rut").parentElement.parentElement.classList.add('has-error');
    }
}


</script>
@endsection
