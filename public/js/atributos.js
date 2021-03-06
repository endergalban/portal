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
/******/ 	return __webpack_require__(__webpack_require__.s = 55);
/******/ })
/************************************************************************/
/******/ ({

/***/ 55:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(56);


/***/ }),

/***/ 56:
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
        atributos: [],
        paginador: '',
        paginaVisible: 1,
        paginaVisible2: 1,
        cantidadAtributos: 0,
        numeroPaginas: [],
        numeroPaginas2: [],
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
            entidad_id: 0,
            entidad_descripcion: ''
        },

        desplegarAtributos: false,
        index: -2,
        indexAtributo: -2,
        indexEntidadAtributo: -1,
        entidadPadre: '',
        atributoPadre: '',
        atributoPadreDescripcion: '',
        atributosPadre: []
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
            this.elementoAtributo.entidad_descripcion = '';
            this.indexAtributo = -2;
            this.entidadePadre = '';
            this.atributoPadre = '';
            this.atributosPadre = [];
            this.atributoPadreDescripcion = '';
        },
        armarPaginador: function armarPaginador() {
            var tipo = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;

            var visibles = this.paginador.per_page;
            var arrayPaginador = [];
            if (tipo == 1) {
                this.numeroPaginas = [];
                this.paginaVisible = this.paginador.current_page;
            } else {
                this.numeroPaginas2 = [];
                this.paginaVisible2 = this.paginador.current_page;
                this.cantidadAtributos = this.paginador.total;
            }

            for (i = 1; i <= this.paginador.last_page; i++) {
                arrayPaginador.push(i);
            }
            if (tipo == 1) {
                this.numeroPaginas = arrayPaginador;
            } else {
                this.numeroPaginas2 = arrayPaginador;
            }
            return;
        },
        cambioPagina: function cambioPagina(page) {
            this.desplegarAtributos = false;
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
                _this.armarPaginador(1);
                // ventanaCargando();
                // $(window).scrollTop(0);
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
                _this2.armarPaginador(1);
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
            this.desplegarAtributos = false;
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
            $(window).scrollTop(0);
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
                _this3.armarPaginador(1);
                _this3.limpiarElementoEntidad();
            }).catch(function (error) {
                _this3.mensajeError = 'Error interno.';
                _this3.limpiarElementoEntidad();
            });
        },
        cambioPagina2: function cambioPagina2(index, page) {
            this.limpiarMensajes();
            this.cargarElementoEntidadAtributo(index, page);
        },
        cargarElementoEntidadAtributo: function cargarElementoEntidadAtributo(index) {
            var _this4 = this;

            var page = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 1;

            this.limpiarElementoAtributo();
            this.limpiarElementoEntidad();
            this.desplegarAtributos = true;
            this.indexEntidadAtributo = index;
            this.elementoAtributo.entidad_descripcion = this.elementos[index].descripcion;
            var url = urlActual + '/obeneratributos/' + this.elementos[index].id + '?page=' + page;
            axios.get(url).then(function (response) {
                _this4.atributos = response.data.data;
                _this4.paginador = response.data;
                _this4.armarPaginador(2);
            }).catch(function (error) {
                $(window).scrollTop(0);
                // ventanaCargando();
                _this4.mensajeError = 'Error interno.';
            });
        },
        cargarElementoAtributo: function cargarElementoAtributo(indexAtributoEntidad, indexAtributo) {
            this.indexAtributo = indexAtributo;
            if (this.indexAtributo == -1) {
                this.elementoAtributo.id = 0;
                this.elementoAtributo.descripcion = '';
                this.elementoAtributo.orden = 0;
                this.elementoAtributo.estado = 1;
                this.atributoPadreDescripcion = '';
            } else {
                this.elementoAtributo.id = this.atributos[indexAtributo].id;
                this.elementoAtributo.descripcion = this.atributos[indexAtributo].descripcion;
                this.elementoAtributo.orden = this.atributos[indexAtributo].orden;
                this.elementoAtributo.estado = this.atributos[indexAtributo].estado;
                this.atributoPadreDescripcion = this.atributos[indexAtributo].atributo_padre ? this.atributos[indexAtributo].atributo_padre.entidad.descripcion + ' > ' + this.atributos[indexAtributo].atributo_padre.descripcion : 'N/A';
            }
            this.elementoAtributo.entidad_id = this.elementos[indexAtributoEntidad].id;
        },
        guardarElementoAtributo: function guardarElementoAtributo(index) {
            var _this5 = this;

            var datos = new FormData();
            datos.append('orden', this.elementoAtributo.orden);
            datos.append('descripcion', this.elementoAtributo.descripcion);
            datos.append('estado', this.elementoAtributo.estado);
            datos.append('entidad_id', this.elementoAtributo.entidad_id);
            datos.append('id', this.elementoAtributo.id);
            if (this.atributoPadre != '') {
                datos.append('padre', this.atributoPadre);
            }
            axios.post(urlActual + '/store_atributo', datos).then(function (response) {
                _this5.atributos = response.data.data;
                _this5.paginador = response.data;
                _this5.armarPaginador(2);
                _this5.limpiarElementoAtributo();
            }).catch(function (error) {
                _this5.mensajeError = 'Error interno.';
                _this5.limpiarElementoAtributo();
            });
        },
        eliminarElementoAtributo: function eliminarElementoAtributo() {
            var _this6 = this;

            var datos = new FormData();
            datos.append('id', this.atributos[this.indexAtributo].id);
            axios.post(urlActual + '/destroy_atributo', datos).then(function (response) {
                _this6.atributos = response.data.data;
                _this6.paginador = response.data;
                _this6.armarPaginador(2);
                _this6.limpiarElementoAtributo();
                $("#eliminarModalAtributo").modal('hide');
            }).catch(function (error) {
                _this6.mensajeError = 'Error interno.';
                _this6.limpiarElementoAtributo();
                $("#eliminarModalAtributo").modal('hide');
            });
        },
        ventanaAtributoPadre: function ventanaAtributoPadre() {
            $("#modalAtributoPadre").modal('show');
        },
        cerrarVentanaAtributoPadre: function cerrarVentanaAtributoPadre(tipo) {
            if (tipo == 0) {
                this.atributoPadre = '';
                this.atributoPadreDescripcion = '';
            } else {
                this.atributoPadreDescripcion = document.getElementById('entidadPadre').options[document.getElementById('entidadPadre').selectedIndex].text + ' > ' + document.getElementById('atributoPadre').options[document.getElementById('atributoPadre').selectedIndex].text;
            }
            this.entidadPadre = '';
            this.atributosPadre = [];
            $("#modalAtributoPadre").modal('hide');
        },
        cargarAtributosPadre: function cargarAtributosPadre() {
            var _this7 = this;

            var url = urlActual + '/' + this.entidadPadre + '/atributos';
            axios.get(url).then(function (response) {
                _this7.atributosPadre = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        }
    }
});

/***/ })

/******/ });