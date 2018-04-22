var regExpSoloNumeros = new RegExp(/^[0-9]*$/);
var regExpPrecio = /^([0-9]+\.?[0-9]{0,2})$/;
var regExpSoloAlfanumericos = new RegExp(/^[a-zA-Z0-9]*$/);
var regExpCorreoElectronico = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
var regExpCaracteresReemplazarRUT = new RegExp(/[.-]/g);
var regExpSoloLetras = new RegExp(/^[a-zA-Z ]*$/);
var regExRut = new RegExp(/^[0-9]{7,8}\-[K|k|0-9]$/);
var regExPassword = new RegExp(/^[0-9a-zA-Z]{6,12}$/);

function validaRut(rut) {
	var numero = rut.substr(0, rut.length - 1);
	var dv = (rut.substr(rut.length - 1)).toLowerCase();
	if(isNaN(numero) || rut.length < 8 || numero === dv) {
		return false;
	} else {
		var dv_r = digitoVerificadorRut(numero);
		if(dv_r != dv || dv_r===false) { return false; }

		return true;
	}
}

function digitoVerificadorRut(numero) {

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

function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {
              return true;
          }else if(key == 46){
                if(filter(tempValue)=== false){
                    return false;
                }else{
                    return true;
                }
          }else{
              return false;
          }
    }
}
function filter(__val__){
    if(regExpPrecio.test(__val__) === true){
        return true;
    }else{
       return false;
    }

}

function ventanaCargando(){
	var ventanaOverlay = document.getElementById('ventanaOverlay');
	if(ventanaOverlay.classList.contains('hide')){
	    ventanaOverlay.classList.remove('hide');
	}else{
	    ventanaOverlay.classList.add('hide');
	}
}
