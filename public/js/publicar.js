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
      descripcion: 'dsada',
      estado: 1,
      cantidad: 1,
      producto_id: 1
    },
    index: -1,
    entidades: [],
    listadoPublicaciones: 1,
    tab: 1,
    imagenes: []

  },
  computed: {
    deshabilitarBtnImagenes: function deshabilitarBtnImagenes() {
      return this.elemento.descripcion.toString().trim().length == 0 || !regExpSoloNumeros.test(this.elemento.estado) || this.elemento.cantidad.toString().trim().length == 0 || !regExpSoloNumeros.test(this.elemento.cantidad) || this.elemento.producto_id.toString().trim().length == 0;
    }
  },
  methods: {
    cancelarPublicacion: function cancelarPublicacion() {
      listadoPublicaciones = 0;
      this.tab = 0;
      this.elemento.id = 0;
      this.descripcion = '';
      this.estado = 1;
      this.cantidad = 1;
      this.producto_id = '';
      this.cargarImagenALienzo(0);
    },

    cargarAtributos: function cargarAtributos() {
      var _this = this;

      productos.forEach(function (producto) {
        if (producto.id == _this.elemento.producto_id) {
          _this.entidades = producto.entidades;
        }
      });
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
        img.src = 'http://maestroselectronics.com/wp-content/uploads/2017/12/No_Image_Available.jpg';
        img.setAttribute('width', '450px');
        img.setAttribute('height', '300px');
        img.setAttribute('id', 'imagenLienzo');
        //lienzo.removeChild('imagenLienzo');
        lienzo.appendChild(img);
      } else {

        var fileinput = document.getElementById('imagen');
        var file = fileinput.files[0];
        if (file.type.match('image.*')) {
          var reader = new FileReader();
          // Read in the image file as a data URL.
          reader.readAsDataURL(file);
          reader.onload = function (evt) {
            if (evt.target.readyState == FileReader.DONE) {
              img.src = evt.target.result;
              context.drawImage(img, 100, 100);
              img.setAttribute('width', '450px');
              img.setAttribute('height', '300px');
              img.setAttribute('id', 'imagenLienzo');
              lienzo.removeChild(lienzo.childNodes[0]);
              lienzo.appendChild(img);
              vue.imagenes.push(img.src);
            }
          };
        } else {
          alert("Solo se permiten imagenes");
        }
      }
    }

  }
});

/***/ })

/******/ });