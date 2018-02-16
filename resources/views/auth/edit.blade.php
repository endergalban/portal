@extends('layouts.app')

@section('content')
<div class="container" id="container">
    <!-- Usuarios -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
        <div class="panel-body">
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
                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control" name="rut" value="{{ $user->rut}}"  autofocus>

                                @if ($errors->has('rut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email}}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                 <input id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button  class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
          </div>
      </div>
  </div>
</div>
@push('scripts')
<script type="text/javascript">
/*$(document).ready(function() {
  $('#submitForm').on('click', function() {
    // gets field values
    var form = $('#edit-form-user');
    var rut = form.find('#rut');
    var name = form.find('#name');
    var email = form.find('#email');
    var password = form.find('#password');
    var passwordConfirm = form.find('#password-confirm');
  
  $('*').removeClass('has-error');
    var error = 0;
    if(name.val().length<6){
      name.addClass('has-error');
      error = 1;
    }
console.log(name);
   /* var email = $(this).find('input[name="email"]');        // E-mail                        // Gender
    var age = $(this).find('select[name="age"]');           // Age
    var msg = $(this).find('#msg');                                   // Message
    // remove class "error" from al elements
    // sets a variable "error" used to deermine if submit or no the form
    $('*').removeClass('has-error');
    var error = 0;
    var regx = /^([a-z0-9_\-\.])+\@([a-z0-9_\-\.])+\.([a-z]{2,4})$/i;   // regexp for e-mail
         
    // check "name"
    if(name.val().length<2){
      name.addClass('has-error');
      error = 1;
    }
    // check "email"
    if(!regx.test(email.val())){
      email.addClass('has-error');
      error = 1;
    }
    // check radio input "gen", if undefined (not checked),
    // add class "error" to element that includes radio inputs
    if(gen.val()==undefined){
      $('#gen').addClass('has-error');
      error = 1;
    }
    // check "age", if no selected (value of <select> is the value of first <option>, initially displayed)
    if(age.val()==age.find('option:first').val()){
      age.addClass('has-error');
      error = 1;
    }
    // check "msg"
    if(msg.val().length<5){
      msg.addClass('has-error');
      error = 1;
    }
    // if error is 0, submit the form
    // else alerts a message and blocks the submission by returning false
    if(error==0) {
      $(tihs).submit();
    }
    else {
      alert('Please fill all fields with red border');
      return false;      // necesary to not submit the form
    }
  });
});
/*validarGuardar: function () {
            var hasError = true;
            if (this.elemento.name.toString().trim().length == 0 ) {
              document.querySelector("#nombre").parentElement.classList.add('has-error');
              
              hasError = false;
            } else {
              document.querySelector("#nombre").parentElement.classList.remove('has-error');
            } 
            if (!regExRut.test(this.elemento.rut) ) {
             document.querySelector("#rut").parentElement.classList.add('has-error');
              
              hasError = false;
            } else {
              document.querySelector("#rut").parentElement.classList.remove('has-error');
            } 
            if (this.elemento.id == 0 && !regExPassword.test(this.elemento.password)) {
              document.querySelector("#password").parentElement.classList.add('has-error');
              
              hasError = false;
            } else {
              document.querySelector("#password").parentElement.classList.remove('has-error');
            } 
            if (this.elemento.id > 0 && this.elemento.password.toString().trim().length > 0 && !regExPassword.test(this.elemento.password)) {
              document.querySelector("#password").parentElement.classList.add('has-error');
              
              hasError = false;
            } else {
              document.querySelector("#password").parentElement.classList.remove('has-error');
            } 
            if (!regExpCorreoElectronico.test(this.elemento.email)) {
              document.querySelector("#email").parentElement.classList.add('has-error');
              
              hasError = false;
            } else {
              document.querySelector("#email").parentElement.classList.remove('has-error');
            } 
            return hasError;
          },*/
</script>
@endpush
@endsection
