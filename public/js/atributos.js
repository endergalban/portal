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
        document.getElementById("container").classList.remove('hidden');
    },
    data: {
        mensajeError: '',
        mensajeOk: '',
        elementos: [],
        paginador: '',
        numeroPaginas: [],
        elementoEntidad: {
            id: 0,
            orden: 0,
            descripcion: '',
            estado: 1,
            tipo: 1,
            atributos: []
        },

        elementoAtributo: {
            id: 0,
            orden: 0,
            descripcion: '',
            estado: 1,
            entidad_id: 0
        },

        cargando: false,
        index: -2,
        indexAtributo: -2,
        indexEntidadAtributo: -1

    },
    computed: {
        mostrarPaginador: function mostrarPaginador() {

            return this.paginador.last_page !== 1;
        },

        habilitarGuardarEntidad: function habilitarGuardarEntidad() {
            return this.elementoEntidad.descripcion.toString().trim().length == 0 || this.elementoEntidad.orden.toString().trim().length == 0 || this.elementoEntidad.estado.toString().trim().length == 0;
        },

        habilitarGuardarAtributo: function habilitarGuardarAtributo() {
            return this.elementoAtributo.descripcion.toString().trim().length == 0 || this.elementoAtributo.orden.toString().trim().length == 0 || this.elementoAtributo.estado.toString().trim().length == 0 || this.elementoAtributo.entidad_id == 0;
        }

    },
    methods: {
        limpiarMensajes: function limpiarMensajes() {
            this.mensajeError = '';
            this.mensajeOk = '';
        },

        setCargando: function setCargando(button) {
            if (this.cargando == true) {
                $('#' + button + '').button('reset');
                this.cargando = false;
            } else {
                $('#' + button + '').button('loading');
                this.cargando = true;
            }
        },

        limpiarElementoEntidad: function limpiarElementoEntidad() {

            this.elementoEntidad.id = 0;
            this.elementoEntidad.descripcion = '';
            this.elementoEntidad.orden = 0;
            this.elementoEntidad.estado = 1;
            this.elementoEntidad.tipo = 1;
            this.elementoEntidad.atributos = [];
            this.index = -2;
        },
        limpiarElementoAtributo: function limpiarElementoAtributo() {

            this.elementoAtributo.id = 0;
            this.elementoAtributo.descripcion = '';
            this.elementoAtributo.orden = 0;
            this.elementoAtributo.estado = 1;
            this.elementoAtributo.entidad_id = 0;
            this.indexAtributo = -2;
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

        eliminarElementoEntidad: function eliminarElementoEntidad() {
            var _this2 = this;

            var datos = new FormData();
            datos.append('id', this.elementos[this.index].id);
            axios.post(urlActual + '/delete', datos).then(function (response) {
                _this2.elementos = response.data.data;
                _this2.paginador = response.data;
                _this2.armarPaginador();
                _this2.limpiarElementoEntidad();
                $("#eliminarModalEntidad").modal('hide');
            }).catch(function (error) {
                $(window).scrollTop(0);
                _this2.mensajeError = 'Error interno.';
                _this2.limpiarElementoEntidad();
                $("#eliminarModalEntidad").modal('hide');
            });
        },

        cargarElementoEntidad: function cargarElementoEntidad(i) {
            this.indexEntidadAtributo = -1;
            this.indexAtributo = -2;
            this.index = i;
            if (this.index == -1) {
                this.elementoEntidad.id = 0;
                this.elementoEntidad.descripcion = '';
                this.elementoEntidad.orden = 0;
                this.elementoEntidad.estado = 1;
                this.elementoEntidad.tipo = 1;
                this.elementoEntidad.atributos = [];
            } else {
                this.elementoEntidad.id = this.elementos[this.index].id;
                this.elementoEntidad.tipo = this.elementos[this.index].tipo;
                this.elementoEntidad.descripcion = this.elementos[this.index].descripcion;
                this.elementoEntidad.orden = this.elementos[this.index].orden;
                this.elementoEntidad.estado = this.elementos[this.index].estado;
                this.elementoEntidad.atributos = this.elementos[this.index].atributos;
            }
        },

        guardarElementoEntidad: function guardarElementoEntidad(index) {
            var _this3 = this;

            this.limpiarMensajes();
            var datos = new FormData();
            datos.append('orden', this.elementoEntidad.orden);
            datos.append('descripcion', this.elementoEntidad.descripcion);
            datos.append('estado', this.elementoEntidad.estado);
            datos.append('tipo', this.elementoEntidad.tipo);
            datos.append('id', this.elementoEntidad.id);
            axios.post(urlActual + '/store', datos).then(function (response) {
                _this3.elementos = response.data.data;
                _this3.paginador = response.data;
                _this3.armarPaginador();
                _this3.limpiarElementoEntidad();
            }).catch(function (error) {
                _this3.mensajeError = 'Error interno.';
                _this3.limpiarElementoEntidad();
            });
        },

        cargarElementoEntidadAtributo: function cargarElementoEntidadAtributo(index) {
            this.limpiarElementoAtributo();
            this.limpiarElementoEntidad();
            this.indexEntidadAtributo = index;
        },

        cargarElementoAtributo: function cargarElementoAtributo(indexAtributoEntidad, indexAtributo) {
            this.indexAtributo = indexAtributo;
            if (this.indexAtributo == -1) {
                this.elementoAtributo.id = 0;
                this.elementoAtributo.descripcion = '';
                this.elementoAtributo.orden = 0;
                this.elementoAtributo.estado = 1;
            } else {
                this.elementoAtributo.id = this.elementos[indexAtributoEntidad].atributos[indexAtributo].id;
                this.elementoAtributo.descripcion = this.elementos[indexAtributoEntidad].atributos[indexAtributo].descripcion;
                this.elementoAtributo.orden = this.elementos[indexAtributoEntidad].atributos[indexAtributo].orden;
                this.elementoAtributo.estado = this.elementos[indexAtributoEntidad].atributos[indexAtributo].estado;
            }
            this.elementoAtributo.entidad_id = this.elementos[indexAtributoEntidad].id;
        },

        guardarElementoAtributo: function guardarElementoAtributo(index) {
            var _this4 = this;

            var datos = new FormData();
            datos.append('orden', this.elementoAtributo.orden);
            datos.append('descripcion', this.elementoAtributo.descripcion);
            datos.append('estado', this.elementoAtributo.estado);
            datos.append('entidad_id', this.elementoAtributo.entidad_id);
            datos.append('id', this.elementoAtributo.id);
            axios.post(urlActual + '/store_atributo', datos).then(function (response) {
                _this4.elementos = response.data.data;
                _this4.paginador = response.data;
                _this4.armarPaginador();
                _this4.limpiarElementoAtributo();
            }).catch(function (error) {
                _this4.mensajeError = 'Error interno.';
                _this4.limpiarElementoAtributo();
            });
        },

        eliminarElementoAtributo: function eliminarElementoAtributo() {
            var _this5 = this;

            var datos = new FormData();
            datos.append('id', this.elementos[this.indexEntidadAtributo].atributos[this.indexAtributo].id);
            axios.post(urlActual + '/destroy_atributo', datos).then(function (response) {
                _this5.elementos = response.data.data;
                _this5.paginador = response.data;
                _this5.armarPaginador();
                _this5.limpiarElementoAtributo();
                $("#eliminarModalAtributo").modal('hide');
            }).catch(function (error) {
                _this5.mensajeError = 'Error interno.';
                _this5.limpiarElementoAtributo();
                $("#eliminarModalAtributo").modal('hide');
            });
        }
    }
});

/***/ })

/******/ });