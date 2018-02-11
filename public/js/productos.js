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
/******/ 	return __webpack_require__(__webpack_require__.s = 47);
/******/ })
/************************************************************************/
/******/ ({

/***/ 47:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(48);


/***/ }),

/***/ 48:
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
      descripcion: '',
      estado: 1,
      atributos: []
    },
    cargando: false,
    index: -2
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

    setCargando: function setCargando(button) {
      if (this.cargando == true) {
        $('#' + button + '').button('reset');
        this.cargando = false;
      } else {
        $('#' + button + '').button('loading');
        this.cargando = true;
      }
    },

    limpiarElemento: function limpiarElemento() {
      this.index = -2;
      this.elemento.id = 0;
      this.elemento.descripcion = '';
      this.elemento.estado = 1;
      this.elemento.atributos = [];
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

      this.setCargando('btn_eliminar' + index);
      var datos = new FormData();
      datos.append('id', this.elementos[index].id);
      axios.post(urlActual + '/delete', datos).then(function (response) {
        _this2.elementos = response.data.data;
        _this2.paginador = response.data;
        _this2.armarPaginador();
        _this2.limpiarElemento();
        _this2.setCargando('btn_eliminar' + index);
      }).catch(function (error) {
        $(window).scrollTop(0);
        _this2.mensajeError = 'Error interno.';
        _this2.limpiarElemento();
        _this2.setCargando('btn_eliminar' + index);
      });
    },

    cargarElemento: function cargarElemento(i) {
      this.limpiarElemento();
      this.index = i;
      if (this.index == -1) {
        this.elemento.id = 0;
        this.elemento.descripcion = '';
        this.elemento.estado = 1;
        this.elemento.atributos = [];
      } else {
        this.elemento.id = this.elementos[this.index].id;
        this.elemento.descripcion = this.elementos[this.index].descripcion;
        this.elemento.estado = this.elementos[this.index].estado;
        this.elemento.atributos = this.elementos[this.index].atributos;
      }
    },

    guardar: function guardar(index) {
      var _this3 = this;

      var atributosselector = document.querySelectorAll("input[name^='atributos[']:checked");
      var atributos = [];
      for (var j = 0; j < atributosselector.length; j++) {
        atributos.push(atributosselector.item(j).value);
      }

      this.limpiarMensajes();
      var datos = new FormData();
      datos.append('descripcion', this.elemento.descripcion);
      datos.append('estado', this.elemento.estado);
      datos.append('id', this.elemento.id);
      datos.append('atributos', atributos);
      axios.post(urlActual + '/store', datos).then(function (response) {
        _this3.elementos = response.data.data;
        _this3.paginador = response.data;
        _this3.armarPaginador();
        _this3.limpiarElemento();
      }).catch(function (error) {
        _this3.mensajeError = 'Error interno.';
        _this3.limpiarElemento();
      });
    },

    verificarCheck: function verificarCheck() {
      var atributosselector = document.querySelectorAll("input[name^='atributos[']");
      for (var i = 0; i < atributosselector.length; i++) {
        atributosselector[i].checked = false;
      }
      for (var i = 0; i < atributosselector.length; i++) {
        for (var j = 0; j < this.elemento.atributos.length; j++) {
          if (atributosselector[i].value == this.elemento.atributos[j].id) {
            atributosselector[i].checked = true;
          }
        }
      };
    }

  }
});

/***/ })

/******/ });