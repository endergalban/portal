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
/******/ 	return __webpack_require__(__webpack_require__.s = 45);
/******/ })
/************************************************************************/
/******/ ({

/***/ 45:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(46);


/***/ }),

/***/ 46:
/***/ (function(module, exports) {

var vue = new Vue({
  el: '#container',
  created: function created() {
    document.getElementById("container").classList.remove('hidden');
    this.cargarImagenALienzo(0);
  },
  data: {
    publicaciones: publicaciones,
    productos: productos,
    mensajeError: '',
    mensajeOk: '',
    elemento: {
      id: 0,
      producto: '',
      descripcion: '',
      estado: 1,
      cantidad: 1,
      producto_id: '',
      region_id: '',
      monto: 0
    },
    buscarFiltro: '',
    estadoFiltro: '',
    termino: false,
    index: -1,
    entidades: [],
    listadoPublicaciones: 1,
    tab: 0,
    imagenes: [],
    entidadesSeleccionadas: []

  },
  computed: {
    deshabilitarBtnImagenes: function deshabilitarBtnImagenes() {
      return this.elemento.producto.toString().trim().length == 0 || this.elemento.estado.toString().trim().length == 0 || this.elemento.descripcion.toString().trim().length == 0 || this.elemento.monto.toString().trim().length == 0 || !regExpSoloNumeros.test(this.elemento.monto) || this.elemento.monto == 0 || this.elemento.cantidad.toString().trim().length == 0 || this.elemento.cantidad == 0 || this.elemento.region_id.toString().trim().length == 0;
    },
    deshabilitarBtnEditar: function deshabilitarBtnEditar() {
      return this.elemento.descripcion.toString().trim().length == 0 || this.elemento.monto.toString().trim().length == 0 || !regExpSoloNumeros.test(this.elemento.estado) || this.elemento.cantidad.toString().trim().length == 0 || !regExpSoloNumeros.test(this.elemento.cantidad);
    }
  },
  methods: {
    filtrar: function filtrar() {
      document.location = urlActual + '?buscar=' + this.buscarFiltro + '&estado=' + this.estadoFiltro;
    },
    top: function top() {
      $(window).scrollTop(0);
    },
    cancelarPublicacion: function cancelarPublicacion() {
      this.listadoPublicaciones = 1;
      this.tab = 0;
      this.elemento.id = 0;
      this.elemento.descripcion = '';
      this.elemento.region_id = '';
      this.elemento.estado = 1;
      this.elemento.cantidad = 1;
      this.elemento.monto = 0;
      this.elemento.producto_id = '';
      this.cargarImagenALienzo(0);
      this.entidadesSeleccionadas = [];
    },
    cargarTextoPublicacion: function cargarTextoPublicacion() {
      var elt = document.getElementById('producto_id');
      if (elt.selectedIndex == '' || elt.selectedIndex == 0) {
        this.elemento.producto = '';
      } else {
        this.elemento.producto = elt.options[elt.selectedIndex].text;
      }
    },
    obtenerEntidades: function obtenerEntidades() {
      var _this = this;

      this.entidadesSeleccionadas = [];
      var elems = document.getElementsByName('atributos[]');
      elems.forEach(function (selector) {
        if (selector.value.toString().trim().length > 0) {
          _this.entidadesSeleccionadas.push(selector.options[selector.selectedIndex].text);
        }
      });
    },
    cargarAtributos: function cargarAtributos() {
      var _this2 = this;

      this.cargarTextoPublicacion();
      productos.forEach(function (producto) {
        if (producto.id == _this2.elemento.producto_id) {
          _this2.entidades = producto.entidades;
        }
      });
    },
    cargarImagenesMiniaturas: function cargarImagenesMiniaturas() {
      var i = 1;
      this.imagenes.forEach(function (img) {
        var nodeImg = document.getElementById('imagen_' + i + '');
        nodeImg.src = img;
        var ns;
        i = i + 1;
      });
    },
    eliminarImagen: function eliminarImagen(index) {
      for (var i = 1; i < 6; i++) {
        document.getElementById('imagen_' + i + '').src = '../images/no-image.jpg';
      };
      document.getElementById('imagenLienzo').src = 'http://placehold.it/640x580';
      this.imagenes.splice(index - 1, 1);
      this.cargarImagenesMiniaturas();
    },
    previsualizarImagen: function previsualizarImagen(index) {
      document.getElementById('imagenLienzo').src = this.imagenes[index - 1];
    },
    cargarImagenALienzo: function cargarImagenALienzo(tipo) {
      var canvas = document.getElementById('canvas');
      var context = canvas.getContext("2d");
      var img = new Image();
      var lienzo = document.getElementById("lienzo");
      if (tipo == 0) {

        img.onload = function () {
          context.drawImage(img, 0, 0);
        };
        img.src = 'http://placehold.it/700x400';
        img.setAttribute('width', '640px');
        //img.setAttribute('height','580px');
        img.setAttribute('id', 'imagenLienzo');
        lienzo.removeChild(lienzo.childNodes[0]);
        lienzo.appendChild(img);
      } else {

        var fileinput = document.getElementById('imagen');
        if (document.querySelector('#imagen').value.length > 0 && this.imagenes.length < 7) {
          var file = fileinput.files[0];
          if (file.type.match('image.*')) {
            var reader = new FileReader();
            // Read in the image file as a data URL.
            reader.readAsDataURL(file);
            reader.onload = function (evt) {
              if (evt.target.readyState == FileReader.DONE) {
                img.src = evt.target.result;
                context.drawImage(img, 100, 100);
                img.setAttribute('width', '640px');
                //   img.setAttribute('height','580px');
                img.setAttribute('id', 'imagenLienzo');
                lienzo.removeChild(lienzo.childNodes[0]);
                lienzo.appendChild(img);
                vue.imagenes.push(img.src);
                vue.cargarImagenesMiniaturas();
              }
            };
          } else {
            alert("Solo se permiten imagenes");
          }
        }
      }
    },
    cargarElemento: function cargarElemento(index) {
      this.index = index;
      this.elemento.id = this.publicaciones[this.index].id;
    },
    editarElemento: function editarElemento(index) {
      this.index = index;
      this.elemento.id = this.publicaciones[this.index].id;
      this.elemento.cantidad = this.publicaciones[this.index].cantidad;
      this.elemento.descripcion = this.publicaciones[this.index].descripcion;
      this.elemento.estado = this.publicaciones[this.index].estado;
      this.elemento.monto = this.publicaciones[this.index].monto;
    },
    actualizarElemento: function actualizarElemento() {
      var _this3 = this;

      var datos = new FormData();
      datos.append('id', this.elemento.id);
      datos.append('descripcion', this.elemento.descripcion);
      datos.append('cantidad', this.elemento.cantidad);
      datos.append('monto', this.elemento.monto);
      datos.append('estado', this.elemento.estado);
      axios.post(urlActual + '/update', datos).then(function (response) {
        $(window).scrollTop(0);
        $('#editarModal').modal('hide');
        _this3.publicaciones[_this3.index].cantidad = _this3.elemento.cantidad;
        _this3.publicaciones[_this3.index].descripcion = _this3.elemento.descripcion;
        _this3.publicaciones[_this3.index].estado = _this3.elemento.estado;
        _this3.publicaciones[_this3.index].monto = _this3.elemento.monto;
        _this3.cancelarPublicacion();
      }).catch(function (error) {
        $(window).scrollTop(0);
        _this3.mensajeError = 'Error interno.';
        $('#editarModal').modal('hide');
      });
    },
    eliminarElemento: function eliminarElemento() {
      var _this4 = this;

      var datos = new FormData();
      datos.append('id', this.elemento.id);
      axios.post(urlActual + '/delete', datos).then(function (response) {
        $(window).scrollTop(0);
        $('#eliminarModal').modal('hide');
        _this4.publicaciones.splice(_this4.index, 1);
        _this4.cancelarPublicacion();
      }).catch(function (error) {
        $(window).scrollTop(0);
        _this4.mensajeError = 'Error interno.';
        $('#eliminarModal').modal('hide');
      });
    }
  }
});

/***/ })

/******/ });