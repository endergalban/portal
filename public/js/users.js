/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 42);
/******/ })
/************************************************************************/
/******/ ({

/***/ 42:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(43);


/***/ }),

/***/ 43:
/***/ (function(module, exports) {

var vue = new Vue({
    el: '#container',
    created: function created() {
        this.obtenerElementos();
        document.getElementById("container").classList.remove('hidden');
    },
    data: {
        mensajeError: '',
        mensajeOk: '',
        elementos: [],
        paginador: '',
        numeroPaginas: [],
        elemento: {
            id: 0,
            name: '',
            lastname: '',
            email: '',
            password: '',
            telefono: '',
            direccion: '',
            region_id: '',
            rut: '',
            estatus: 1,
            tipo: 0
        },
        index: -2,
        tipoFiltro: '',
        estatusFiltro: '',
        buscarFiltro: ''
    },
    computed: {
        mostrarPaginador: function mostrarPaginador() {
            return this.paginador.last_page !== 1;
        },
        habilitarGuardar: function habilitarGuardar() {
            return this.elemento.name.toString().trim().length == 0 || this.elemento.region_id.toString().trim().length == 0 || !this.verificar(this.elemento.rut) || !regExpCorreoElectronico.test(this.elemento.email) || this.index == -1 && !regExPassword.test(this.elemento.password) || this.index > -1 && this.elemento.password.toString().trim().length > 0 && !regExPassword.test(this.elemento.password);
        }
    },
    methods: {
        formatoRut: function formatoRut(data) {
            if (this.verificar(this.elemento.rut)) {
                var rut = this.elemento.rut;
                rut = rut.replace(new RegExp('[.]', 'g'), '');
                rut = rut.replace(new RegExp('[-]', 'g'), '');
                var numero = new Intl.NumberFormat('de-DE').format(rut.substr(0, rut.length - 1));
                var dv = rut.substr(rut.length - 1).toLowerCase();
                this.elemento.rut = numero + '-' + dv;
            }
        },
        verificar: function verificar(rut) {
            rut = rut.replace(new RegExp('[.]', 'g'), '');
            rut = rut.replace(new RegExp('[-]', 'g'), '');
            if (validaRut(rut)) {

                return true;
            }

            return false;
        },
        limpiarMensajes: function limpiarMensajes() {
            this.mensajeError = '';
            this.mensajeOk = '';
        },
        limpiarElemento: function limpiarElemento() {
            this.index = -2;
            this.elemento.id = 0;
            this.elemento.name = '';
            this.elemento.lastname = '';
            this.elemento.region_id = '';
            this.elemento.rut = '';
            this.elemento.email = '';
            this.elemento.password = '';
            this.elemento.direccion = '';
            this.elemento.telefono = '';
            this.elemento.estatus = true;
            this.elemento.tipo = 0;
            //document.querySelector("#nombre").parentElement.classList.remove('has-error');
            //document.querySelector("#rut").parentElement.classList.remove('has-error');
            //document.querySelector("#password").parentElement.classList.remove('has-error');
            //document.querySelector("#email").parentElement.classList.remove('has-error');
        },
        armarPaginador: function armarPaginador() {
            var paginasVisibles = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 15;

            this.numeroPaginas = [];
            var desde = this.paginador.current_page - paginasVisibles;
            if (desde < 1) {
                desde = 1;
            }
            hasta = this.paginador.current_page + paginasVisibles;
            if (hasta > this.paginador.last_page) {
                hasta = this.paginador.last_page;
            }
            for (i = desde; i <= hasta; i++) {
                this.numeroPaginas.push(i);
            }

            return;
        },
        cambioPagina: function cambioPagina(page) {
            this.limpiarMensajes();
            this.obtenerElementos(page);
        },
        obtenerElementos: function obtenerElementos() {
            var _this = this;

            var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;

            this.limpiarMensajes();
            var filtros = 'page=' + page + '&buscar=' + this.buscarFiltro + '&tipo=' + this.tipoFiltro + '&estatus=' + this.estatusFiltro;
            var url = urlActual + '/get?' + filtros;
            axios.get(url).then(function (response) {
                _this.elementos = response.data.data;
                _this.paginador = response.data;
                _this.armarPaginador();
                $(window).scrollTop(0);
            }).catch(function (error) {
                $(window).scrollTop(0);
                _this.mensajeError = 'Error interno.';
            });
        },
        filtrar: function filtrar() {
            this.obtenerElementos();
        },
        eliminarElemento: function eliminarElemento() {
            var _this2 = this;

            var datos = new FormData();
            datos.append('id', this.elementos[this.index].id);
            axios.post(urlActual + '/delete', datos).then(function (response) {
                _this2.elementos = response.data.data;
                _this2.paginador = response.data;
                _this2.armarPaginador();
                _this2.limpiarElemento();
                $(window).scrollTop(0);
                $('#eliminarModal').modal('hide');
            }).catch(function (error) {
                $(window).scrollTop(0);
                _this2.mensajeError = 'Error interno.';
                $('#eliminarModal').modal('hide');
            });
        },
        cargarElemento: function cargarElemento(index) {
            this.limpiarElemento();
            // this.limpiarMensajes();
            this.index = index;
            if (this.index > -1) {
                this.elemento.id = this.elementos[index].id;
                this.elemento.name = this.elementos[index].name;
                this.elemento.lastname = this.elementos[index].lastname;
                this.elemento.email = this.elementos[index].email;
                this.elemento.rut = this.elementos[index].rut;
                this.elemento.telefono = this.elementos[index].telefono;
                this.elemento.direccion = this.elementos[index].direccion;
                this.elemento.estatus = this.elementos[index].estatus;
                this.elemento.tipo = this.elementos[index].tipo;
                this.elemento.region_id = this.elementos[index].region_id;
            } else {
                this.elemento.id = 0;
                this.elemento.name = '';
                this.elemento.lastname = '';
                this.elemento.region_id = '';
                this.elemento.email = '';
                this.elemento.rut = '';
                this.elemento.telefono = '';
                this.elemento.direccion = '';
                this.elemento.estatus = 1;
                this.elemento.tipo = 0;
            }
            $(window).scrollTop(0);
        },
        guardar: function guardar() {
            var _this3 = this;

            this.limpiarMensajes();
            var datos = new FormData();
            datos.append('id', this.elemento.id);
            datos.append('name', this.elemento.name);
            datos.append('lastname', this.elemento.lastname);
            datos.append('email', this.elemento.email);
            datos.append('rut', this.elemento.rut);
            datos.append('estatus', this.elemento.estatus);
            datos.append('tipo', this.elemento.tipo);
            datos.append('telefono', this.elemento.telefono);
            datos.append('direccion', this.elemento.direccion);
            datos.append('region_id', this.elemento.region_id);
            if (this.elemento.password.toString().trim().length > 0) {

                datos.append('password', this.elemento.password);
            }
            axios.post(urlActual + '/store', datos).then(function (response) {
                if (response.data == '-1') {
                    _this3.mensajeError = 'El rut ingresado ya se encuentra en los registros';
                } else if (response.data == '-2') {
                    _this3.mensajeError = 'El email ingresado ya se encuentra en los registros';
                } else {
                    _this3.elementos = response.data.data;
                    _this3.paginador = response.data;
                    _this3.armarPaginador();
                    _this3.limpiarElemento();
                }
            }).catch(function (error) {
                _this3.mensajeError = 'Error interno.';
            });
        }
    }
});

/***/ })

/******/ });