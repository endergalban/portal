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
/******/ 	return __webpack_require__(__webpack_require__.s = 41);
/******/ })
/************************************************************************/
/******/ ({

/***/ 41:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(42);


/***/ }),

/***/ 42:
/***/ (function(module, exports) {

var vue = new Vue({
    el: '#container',
    created: function created() {
        this.obtenerElementos();
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
            email: '',
            password: '',
            rut: '',
            estatus: true
        }
    },
    computed: {
        mostrarPaginador: function mostrarPaginador() {

            return this.paginador.last_page !== 1;
        }

    },
    methods: {
        limpiarMensajes: function limpiarMensajes() {
            this.mensajeError = '';
            this.mensajeOk = '';
        },
        limpiarElemento: function limpiarElemento() {
            this.elemento.id = 0;
            this.elemento.name = '';
            this.elemento.rut = '';
            this.elemento.email = '';
            this.elemento.password = '';
            this.elemento.estatus = true;
        },
        armarPaginador: function armarPaginador() {
            var paginasVisibles = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 10;

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
            var filtros = 'page=' + page;
            var url = urlActual + '/get?' + filtros;
            axios.get(url).then(function (response) {
                _this.elementos = response.data.data;
                _this.paginador = response.data;
                _this.armarPaginador();
                // ventanaCargando();
                $(window).scrollTop(0);
            }).catch(function (error) {
                $(window).scrollTop(0);
                // ventanaCargando();
                _this.mensajeError = 'Error interno.';
            });
        },

        eliminarElemento: function eliminarElemento() {
            var _this2 = this;

            var datos = new FormData();
            datos.append('id', this.elemento.id);
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
            this.limpiarMensajes();
            if (index != -1) {
                this.elemento.id = this.elementos[index].id;
                this.elemento.name = this.elementos[index].name;
                this.elemento.email = this.elementos[index].email;
                this.elemento.rut = this.elementos[index].rut;
                this.elemento.estatus = this.elementos[index].estatus;
            }
        },

        validarGuardar: function validarGuardar() {
            var hasError = true;
            if (this.elemento.name.toString().trim().length == 0) {
                document.querySelector("#nombre").parentElement.classList.add('has-error');

                hasError = false;
            } else {
                document.querySelector("#nombre").parentElement.classList.remove('has-error');
            }
            if (!regExRut.test(this.elemento.rut)) {
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
                rdocument.querySelector("#password").parentElement.classList.add('has-error');

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
        },

        guardar: function guardar() {
            var _this3 = this;

            if (this.validarGuardar()) {
                this.limpiarMensajes();
                var datos = new FormData();
                datos.append('id', this.elemento.id);
                datos.append('name', this.elemento.name);
                datos.append('email', this.elemento.email);
                datos.append('rut', this.elemento.rut);
                datos.append('estatus', this.elemento.estatus == true ? 1 : 0);
                if (this.elemento.id == 0) {
                    datos.append('password', this.elemento.password);
                }
                axios.post(urlActual + '/store', datos).then(function (response) {
                    _this3.elementos = response.data.data;
                    _this3.paginador = response.data;
                    _this3.armarPaginador();
                    _this3.mensajeAlerta = 'Operación realizada con éxito';
                    $('#guardarModal').modal('hide');
                }).catch(function (error) {
                    _this3.mensajeError = 'Error interno.';
                    _this3.limpiarElemento();
                    $('#guardarModal').modal('hide');
                });
            }
        }
    }
});

/***/ })

/******/ });