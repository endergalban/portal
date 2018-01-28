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
      orden: 0,
      descripcion: '',
      estado: 1,
      atributos: []
    },
    index: -1
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
      document.querySelector("#entidad_descripcion_nuevo").value = '';
      document.querySelector("#entidad_orden_nuevo").value = 0;
      document.querySelector("#entidad_estado_nuevo").value = 1;
      document.querySelector("#entidadpadre_id_nuevo").value = 0;
      this.elemento.id = 0;
    },
    limpiarAtributo: function limpiarAtributo() {
      document.querySelector("#descripcion_nuevo").value = '';
      document.querySelector("#orden_nuevo").value = 0;
      document.querySelector("#estado_nuevo").value = 1;
      document.querySelector("#id_nuevo").value = 0;
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

    eliminar: function eliminar(index) {
      var _this2 = this;

      var datos = new FormData();
      datos.append('id', document.querySelector("#entidadpadre_id_" + index).value);
      axios.post(urlActual + '/delete', datos).then(function (response) {
        _this2.elementos = response.data.data;
        _this2.paginador = response.data;
        _this2.armarPaginador();
        _this2.limpiarElemento();
      }).catch(function (error) {
        $(window).scrollTop(0);
        _this2.mensajeError = 'Error interno.';
        _this2.limpiarElemento();
      });
    },

    cargarElemento: function cargarElemento(i) {
      // this.limpiarElemento();
      this.index = i;
      if (this.index != -1) {
        this.elemento.id = this.elementos[this.index].id;
        this.elemento.descripcion = this.elementos[this.index].descripcion;
        this.elemento.orden = this.elementos[this.index].orden;
        this.elemento.estado = this.elementos[this.index].estado;
        this.elemento.atributos = this.elementos[this.index].atributos;
      }
    },

    validarGuardar: function validarGuardar(index) {
      var hasError = true;
      if (document.querySelector("#entidad_descripcion_" + index).value.trim().length == 0) {
        document.querySelector("#entidad_descripcion_" + index).parentElement.classList.add('has-error');
        hasError = false;
      } else {
        document.querySelector("#entidad_descripcion_" + index).parentElement.classList.remove('has-error');
      }
      if (document.querySelector("#entidad_orden_" + index).value.trim().length == 0 || !regExpSoloNumeros.test(document.querySelector("#entidad_orden_" + index).value)) {
        document.querySelector("#entidad_orden_" + index).parentElement.classList.add('has-error');
        hasError = false;
      } else {
        document.querySelector("#entidad_orden_" + index).parentElement.classList.remove('has-error');
      }

      return hasError;
    },

    guardar: function guardar(index) {
      var _this3 = this;

      if (this.validarGuardar(index)) {
        this.limpiarMensajes();
        var datos = new FormData();
        datos.append('orden', document.querySelector("#entidad_orden_" + index).value);
        datos.append('descripcion', document.querySelector("#entidad_descripcion_" + index).value);
        datos.append('estado', document.querySelector("#entidad_estado_" + index).value);
        if (document.querySelector("#entidadpadre_id_" + index).value > 0) {
          datos.append('id', document.querySelector("#entidadpadre_id_" + index).value);
        }
        axios.post(urlActual + '/store', datos).then(function (response) {
          _this3.elementos = response.data.data;
          _this3.paginador = response.data;
          _this3.armarPaginador();
          _this3.limpiarElemento();
        }).catch(function (error) {
          _this3.mensajeError = 'Error interno.';
          _this3.limpiarElemento();
        });
      }
    },

    validarGuardarAtributo: function validarGuardarAtributo(index) {

      var hasError = true;
      if (document.querySelector("#descripcion_" + index).value.trim().length == 0) {
        document.querySelector("#descripcion_" + index).parentElement.classList.add('has-error');
        hasError = false;
      } else {
        document.querySelector("#descripcion_" + index).parentElement.classList.remove('has-error');
      }
      if (document.querySelector("#orden_" + index).value.trim().length == 0 || !regExpSoloNumeros.test(document.querySelector("#orden_" + index).value)) {
        document.querySelector("#orden_" + index).parentElement.classList.add('has-error');
        hasError = false;
      } else {
        document.querySelector("#orden_" + index).parentElement.classList.remove('has-error');
      }
      return hasError;
    },

    guardarAtributo: function guardarAtributo(index) {
      var _this4 = this;

      if (this.validarGuardarAtributo(index)) {
        var datos = new FormData();
        datos.append('orden', document.querySelector("#orden_" + index).value);
        datos.append('descripcion', document.querySelector("#descripcion_" + index).value);
        datos.append('estado', document.querySelector("#estado_" + index).value);
        datos.append('entidad_id', this.elemento.id);
        if (document.querySelector("#id_" + index).value != 0) {
          datos.append('id', document.querySelector("#id_" + index).value);
        }
        axios.post(urlActual + '/store_atributo', datos).then(function (response) {
          _this4.elementos = response.data.data;
          _this4.paginador = response.data;
          _this4.armarPaginador();
          _this4.cargarElemento(_this4.index);
          _this4.limpiarAtributo();
        }).catch(function (error) {
          _this4.mensajeError = 'Error interno.';
          _this4.limpiarAtributo();
        });
      }
    },

    eliminarAtributo: function eliminarAtributo(index) {
      var _this5 = this;

      var datos = new FormData();
      datos.append('id', document.querySelector("#id_" + index).value);
      axios.post(urlActual + '/destroy_atributo', datos).then(function (response) {
        _this5.elementos = response.data.data;
        _this5.paginador = response.data;
        _this5.armarPaginador();
        _this5.cargarElemento(_this5.index);
        _this5.limpiarAtributo();
      }).catch(function (error) {
        _this5.mensajeError = 'Error interno.';
        _this5.limpiarAtributo();
      });
    }
  }
});

/***/ })

/******/ });