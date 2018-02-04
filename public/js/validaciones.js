var regExpSoloNumeros = new RegExp(/^[0-9]*$/);
var regExpSoloAlfanumericos = new RegExp(/^[a-zA-Z0-9]*$/);
var regExpCorreoElectronico = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
var regExpCaracteresReemplazarRUT = new RegExp(/[.-]/g);
var regExpSoloLetras = new RegExp(/^[a-zA-Z ]*$/);
var regExRut = new RegExp(/^[0-9]{7,8}\-[K|k|0-9]$/);
var regExPassword = new RegExp(/^[0-9a-zA-Z]{6,12}$/);


function validaRut(rut) {
  var numero = rut.substr(0, rut.length - 1);
  dv = (rut.substr(rut.length - 1)).toLowerCase();

  if(isNaN(numero) || rut.length < 8 || numero === dv) {
    return false;
  } else {
    var dv_r = digitoVerificadorRut(numero);
    if(dv_r != dv || dv_r===false) { return false; }

    return true;
  }
}
function digitoVerificadorRut (numero) {

  if(isNaN(numero) || numero.length < 6) {
    return false;
  } else {
    // Validar Rut
    var total = 0, por = 2;
    for(var i = (numero.length - 1); i >= 0; i--) {
      if(por > 7) { por = 2; }
      total += parseInt(numero[i]) * por;
      por++;
    }
    var resto = total % 11, dv_r = '';
    if(resto === 1) { dv_r = 'k'; }
    else if(resto === 0) { dv_r = 0; }
    else { dv_r = 11 - resto; }
    return dv_r;
  }
}