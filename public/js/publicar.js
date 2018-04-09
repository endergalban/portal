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
/******/ 	return __webpack_require__(__webpack_require__.s = 48);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */,
/* 1 */,
/* 2 */,
/* 3 */
/***/ (function(module, exports) {

// Default configuration
const prefix = 'v-collapse';
const basename = 'collapse';

const defaults = {
    'prefix' : prefix,
    'basename' : basename,
    'togglerClassDefault': prefix + '-toggler',
    'contentClassDefault': prefix + '-content',
    'contentClassEnd': prefix + '-content-end'
};

// Global toggle methods

const toggleElement = function (target, config) {
    target.classList.toggle(config.contentClassEnd);
};

const closeElement = function (target, config) {
    target.classList.remove(config.contentClassEnd);
};

const openElement = function (target, config) {
    target.classList.add(config.contentClassEnd);
};

module.exports={
    defaults,
    toggleElement,
    closeElement,
    openElement,
};

/***/ }),
/* 4 */,
/* 5 */,
/* 6 */,
/* 7 */,
/* 8 */,
/* 9 */,
/* 10 */
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),
/* 11 */,
/* 12 */,
/* 13 */,
/* 14 */,
/* 15 */,
/* 16 */,
/* 17 */,
/* 18 */,
/* 19 */,
/* 20 */,
/* 21 */,
/* 22 */,
/* 23 */,
/* 24 */,
/* 25 */,
/* 26 */,
/* 27 */,
/* 28 */,
/* 29 */,
/* 30 */,
/* 31 */,
/* 32 */,
/* 33 */,
/* 34 */,
/* 35 */,
/* 36 */,
/* 37 */,
/* 38 */,
/* 39 */,
/* 40 */,
/* 41 */
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
module.exports = function(useSourceMap) {
	var list = [];

	// return the list of modules as css string
	list.toString = function toString() {
		return this.map(function (item) {
			var content = cssWithMappingToString(item, useSourceMap);
			if(item[2]) {
				return "@media " + item[2] + "{" + content + "}";
			} else {
				return content;
			}
		}).join("");
	};

	// import a list of modules into the list
	list.i = function(modules, mediaQuery) {
		if(typeof modules === "string")
			modules = [[null, modules, ""]];
		var alreadyImportedModules = {};
		for(var i = 0; i < this.length; i++) {
			var id = this[i][0];
			if(typeof id === "number")
				alreadyImportedModules[id] = true;
		}
		for(i = 0; i < modules.length; i++) {
			var item = modules[i];
			// skip already imported module
			// this implementation is not 100% perfect for weird media query combinations
			//  when a module is imported multiple times with different media queries.
			//  I hope this will never occur (Hey this way we have smaller bundles)
			if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
				if(mediaQuery && !item[2]) {
					item[2] = mediaQuery;
				} else if(mediaQuery) {
					item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
				}
				list.push(item);
			}
		}
	};
	return list;
};

function cssWithMappingToString(item, useSourceMap) {
	var content = item[1] || '';
	var cssMapping = item[3];
	if (!cssMapping) {
		return content;
	}

	if (useSourceMap && typeof btoa === 'function') {
		var sourceMapping = toComment(cssMapping);
		var sourceURLs = cssMapping.sources.map(function (source) {
			return '/*# sourceURL=' + cssMapping.sourceRoot + source + ' */'
		});

		return [content].concat(sourceURLs).concat([sourceMapping]).join('\n');
	}

	return [content].join('\n');
}

// Adapted from convert-source-map (MIT)
function toComment(sourceMap) {
	// eslint-disable-next-line no-undef
	var base64 = btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap))));
	var data = 'sourceMappingURL=data:application/json;charset=utf-8;base64,' + base64;

	return '/*# ' + data + ' */';
}


/***/ }),
/* 42 */,
/* 43 */,
/* 44 */,
/* 45 */,
/* 46 */,
/* 47 */,
/* 48 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(49);


/***/ }),
/* 49 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue2_collapse__ = __webpack_require__(50);
var _elemento;

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }


Vue.use(__WEBPACK_IMPORTED_MODULE_0_vue2_collapse__["a" /* default */]);
var vue = new Vue({
  el: '#container',

  // ...
  created: function created() {
    document.getElementById("container").classList.remove('hidden');
    this.cargarImagenALienzo(0);
  },
  data: {
    tipo: 0,
    cabecera: 'Tipo de Publicación',
    tab: 0,
    listadoPublicaciones: 0,
    publicaciones: [],
    check: [],
    productos: [],
    mensajeError: [],
    mensajeOk: '',
    elemento: (_elemento = {
      id: 0,
      producto_id: '',
      placa: '',
      descripcion: '',
      titulo: '',
      monto: '',
      marca_id: '',
      modelo_id: '',
      anio_id: '',
      version_id: ''
    }, _defineProperty(_elemento, 'descripcion', ''), _defineProperty(_elemento, 'carroceria_id', ''), _defineProperty(_elemento, 'puerta_id', ''), _defineProperty(_elemento, 'transmision_id', ''), _defineProperty(_elemento, 'edicion_id', ''), _defineProperty(_elemento, 'cilindrada_id', ''), _defineProperty(_elemento, 'potencia_id', ''), _defineProperty(_elemento, 'color_id', ''), _defineProperty(_elemento, 'kilometro_id', ''), _defineProperty(_elemento, 'motor_id', ''), _defineProperty(_elemento, 'techo_id', ''), _defineProperty(_elemento, 'combustible_id', ''), _defineProperty(_elemento, 'direccion_id', ''), _defineProperty(_elemento, 'producto_id', ''), _defineProperty(_elemento, 'region_id', ''), _defineProperty(_elemento, 'piezacarroceria_id', ''), _defineProperty(_elemento, 'electrico_id', ''), _defineProperty(_elemento, 'suspencion_id', ''), _elemento),
    entidades: {
      region: [],
      marca: [],
      modelo: [],
      anio: [],
      version: [],
      carroceria: [],
      puerta: [],
      transmision: [],
      edicion: [],
      cilindrada: [],
      potencia: [],
      color: [],
      kilometraje: [],
      motor: [],
      techo: [],
      combustible: [],
      direccion: [],
      seguridad: [],
      comfort: [],
      sonido: [],
      exterior: [],
      ficha: [],
      piezacarroceria: [],
      electrico: [],
      suspencion: []
    },
    buscarFiltro: '',
    estadoFiltro: '',
    termino: false,
    index: -1,
    //    entidades:  [],
    imagenes: [],
    entidadesSeleccionadas: [],
    atributos: []

  },
  computed: {

    deshabilitarBtnPublicar: function deshabilitarBtnPublicar() {
      return this.validar();
    },
    deshabilitarBtnContinuar: function deshabilitarBtnContinuar() {
      return this.validarContinuar();
    },
    deshabilitarPublicarPieza: function deshabilitarPublicarPieza() {
      return this.validarPublicarPieza();
    }
  },
  methods: {
    validar: function validar() {
      return this.elemento.producto_id.toString().trim().length == 0 || this.elemento.monto.toString().trim().length == 0 || !regExpPrecio.test(this.elemento.monto) || this.elemento.descripcion.toString().trim().length == 0 || this.elemento.titulo.toString().trim().length == 0 || this.elemento.modelo_id.toString().trim().length == 0 || this.elemento.anio_id.toString().trim().length == 0 || this.elemento.region_id.toString().trim().length == 0 || this.elemento.placa.toString().trim().length == 0 || this.elemento.marca_id.toString().trim().length == 0;
    },
    validarContinuar: function validarContinuar() {
      return this.elemento.producto_id.toString().trim().length == 0 || this.elemento.modelo_id.toString().trim().length == 0 || this.elemento.marca_id.toString().trim().length == 0 || this.elemento.anio_id.toString().trim().length == 0 || this.elemento.region_id.toString().trim().length == 0 || this.atributos.length == 0;
    },

    validarPublicarPieza: function validarPublicarPieza() {
      var respuesta = false;
      this.atributos.forEach(function (item, key) {
        if (item.id.toString().trim().length == 0) {
          respuesta = true;
        }
        if (item.descripcion.toString().trim().length == 0) {
          respuesta = true;
        }
        if (item.observacion.toString().trim().length == 0) {
          respuesta = true;
        }
        if (!regExpPrecio.test(item.monto)) {
          respuesta = true;
        }
        if (item.estado.toString().trim().length == 0) {
          respuesta = true;
        }
      });
      return respuesta;
    },
    dataURItoBlob: function dataURItoBlob(dataURI) {
      // convert base64/URLEncoded data component to raw binary data held in a string
      var byteString;
      if (dataURI.split(',')[0].indexOf('base64') >= 0) byteString = atob(dataURI.split(',')[1]);else byteString = unescape(dataURI.split(',')[1]);

      // separate out the mime component
      var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

      // write the bytes of the string to a typed array
      var ia = new Uint8Array(byteString.length);
      for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
      }

      return new Blob([ia], { type: mimeString });
    },
    volver: function volver() {
      this.tab = 0;
      this.tipo = 0;
      $(window).scrollTop(0);
    },

    publicarPieza: function publicarPieza() {
      var _this = this;

      if (this.validarPublicarPieza) {
        var request = new FormData();
        var arreglo = [];
        this.atributos.forEach(function (item, key) {
          arreglo.push(JSON.stringify(item));
        });
        request.append('data', JSON.stringify(this.atributos));

        axios.post('publicar/storepieza', request, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }).then(function (response) {
          _this.limpiar();
          _this.elemento.producto_id = '';
          _this.tab = 0;
          _this.tipo = 0;
          _this.titulo = 'TIPO DE PUBLICACIÓN';
          if (response.data == 0) {
            _this.mensajeOk = 'Felicidades tus productos ha sido publicado.';
          }
          $(window).scrollTop(0);
        }).catch(function (error) {
          console.log(error);
          $(window).scrollTop(0);
        });
      }
    },
    guardar: function guardar() {
      var _this2 = this;

      if (!this.validar()) {
        this.mensajeError = '';
        this.mensajeOk = '';
        var request = new FormData();
        var atributos = [];
        var imagenes = [];
        document.querySelectorAll('select[name="atributos[]"]').forEach(function (item, key) {
          if (item.value != '') {
            atributos.push(item.value);
          }
        });
        document.querySelectorAll('input[type="checkbox"],input[name="atributos[]]"').forEach(function (item, key) {
          if (item.checked == true) {
            atributos.push(item.value);
          }
        });
        this.imagenes.forEach(function (item) {
          var blob = _this2.dataURItoBlob(item);
          request.append("imagenes[]", blob);
        });
        request.append('id', this.elemento.id);
        request.append('producto_id', this.elemento.producto_id);
        request.append('descripcion', this.elemento.descripcion);
        request.append('titulo', this.elemento.titulo);
        request.append('monto', this.elemento.monto);
        request.append('placa', this.elemento.placa);
        request.append('estado', 1);
        request.append('cantidad', 1);
        request.append('atributos', atributos);
        request.append('imagenes', imagenes);
        axios.post('publicar/store', request, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }).then(function (response) {
          if (response.data.errors) {
            _this2.mensajeError = response.data.errors;
          } else {
            _this2.limpiar();
            _this2.eliminarImagen();
            _this2.elemento.producto_id = '';
            if (response.data == 0) {
              _this2.mensajeOk = 'Felicidades tu producto ha sido publicado.';
            } else {
              _this2.mensajeOk = 'Felicidades tu publicación ha sido actualiza.';
            }
          }
          $(window).scrollTop(0);
        }).catch(function (error) {
          console.log(error);
          $(window).scrollTop(0);
        });
      }
    },

    obtenermodelos: function obtenermodelos() {
      var _this3 = this;

      if (document.getElementById('id_marca').value > 0) {
        this.elemento.modelo_id = '';
        axios.get('/modelos/' + document.getElementById('id_marca').value + '/obtener').then(function (response) {
          _this3.entidades.modelo = response.data;
        }).catch(function (error) {
          console.log(error);
        });
      }
    },
    obtener: function obtener() {
      this.mensajeError = '';
      this.mensajeOk = '';
      this.limpiar();
      if (this.elemento.producto_id > 0) {
        var url = window.location.href + '/' + this.elemento.producto_id + '/obtener';
        axios.get(url).then(function (response) {
          var entidades = response.data;
          entidades.forEach(function (entidad, index) {
            vue.entidades[entidad.descripcion] = entidad.atributos;
          });
        }).catch(function (error) {
          console.log(error);
        });
      }
    },
    limpiar: function limpiar() {
      this.entidades.marca = [];
      this.entidades.modelo = [];
      this.entidades.anio = [];
      this.entidades.version = [];
      this.entidades.carroceria = [];
      this.entidades.puerta = [];
      this.entidades.transmision = [];
      this.entidades.edicion = [];
      this.entidades.cilindrada = [];
      this.entidades.potencia = [];
      this.entidades.color = [];
      this.entidades.kilometraje = [];
      this.entidades.motor = [];
      this.entidades.techo = [];
      this.entidades.combustible = [];
      this.entidades.direccion = [];
      this.entidades.seguridad = [];
      this.entidades.comfort = [];
      this.entidades.sonido = [];
      this.entidades.exterior = [];
      this.entidades.ficha = [];

      this.elemento.id = 0;
      this.elemento.placa = '';
      this.elemento.descripcion = '';
      this.elemento.titulo = '';
      this.elemento.monto = '';
      this.elemento.marca_id = '';
      this.elemento.modelo_id = '';
      this.elemento.anio_id = '';
      this.elemento.version_id = '';
      this.elemento.carroceria_id = '';
      this.elemento.puerta_id = '';
      this.elemento.transmision_id = '';
      this.elemento.edicion_id = '';
      this.elemento.cilindrada_id = '';
      this.elemento.potencia_id = '';
      this.elemento.color_id = '';
      this.elemento.kilometro_id = '';
      this.elemento.motor_id = '';
      this.elemento.techo_id = '';
      this.elemento.combustible_id = '';
      this.elemento.direccion_id = '';
      this.elemento.region_id = '';
      this.atributos = [];
    },
    cambioTipo: function cambioTipo(tipo, tab) {
      this.tipo = tipo;
      this.tab = tab;
      this.mensajeOk = '';
      this.mensajeError = '';

      if (this.tipo == 1) {
        this.cabecera = 'Venta de Auto';
      } else {
        this.cabecera = 'Venta de Partes';
      }
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
      for (var i = 1; i < 7; i++) {
        document.getElementById('imagen_' + i + '').src = '../images/no-image.jpg';
      };
      // document.getElementById('imagenLienzo').src = 'http://placehold.it/640x580';
      this.imagenes.splice(index - 1, 1);
      this.cargarImagenesMiniaturas();
    },
    anexarAtributo: function anexarAtributo(itemArray, key) {
      var _this4 = this;

      var anexar = true;
      this.atributos.forEach(function (item) {
        if (item.id == _this4.entidades[itemArray][key].id) {
          anexar = false;
        }
      });
      if (anexar == true) {
        this.atributos.push({
          id: this.entidades[itemArray][key].id,
          descripcion: this.entidades[itemArray][key].descripcion,
          estado: '',
          observacion: '',
          monto: '',
          imagenes: [],
          lado: [],
          producto_id: this.elemento.producto_id,
          modelo_id: this.elemento.modelo_id,
          marca_id: this.elemento.marca_id,
          anio_id: this.elemento.anio_id,
          region_id: this.elemento.region_id,
          carroceria_id: this.elemento.carroceria_id
        });
      }
    },
    eliminarAtributo: function eliminarAtributo(index) {
      this.atributos.splice(index, 1);
      if (this.atributos.length == 0) {
        this.tab = 1;
      }
    },
    armarPiezas: function armarPiezas() {
      this.tab = 2;
      $(window).scrollTop(0);
    },
    cargarImagenALienzo: function cargarImagenALienzo(tipo) {
      this.mensajeError = '';
      this.mensajeOk = '';
      var canvas = document.getElementById('canvas');
      var context = canvas.getContext("2d");
      var img = new Image();
      var lienzo = document.getElementById("lienzo");
      if (tipo == 0) {
        img.onload = function () {
          context.drawImage(img, 0, 0);
        };
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
                vue.imagenes.push(img.src);
                vue.cargarImagenesMiniaturas();
              }
            };
          } else {
            alert("Solo se permiten imagenes");
          }
        }
      }
    }
  }
});

/***/ }),
/* 50 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_wrapper_vue__ = __webpack_require__(51);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_wrapper_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__components_wrapper_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__components_group_vue__ = __webpack_require__(58);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__components_group_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__components_group_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__defaults__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__defaults___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2__defaults__);




let VueCollapse = {};
VueCollapse.install = function (Vue, options) {

    // merge configs

    const settings = Object.assign(__WEBPACK_IMPORTED_MODULE_2__defaults__["defaults"], options);

    // creating required components

    Vue.component(settings.prefix + '-wrapper', __WEBPACK_IMPORTED_MODULE_0__components_wrapper_vue___default.a);
    Vue.component(settings.prefix + '-group', __WEBPACK_IMPORTED_MODULE_1__components_group_vue___default.a);

    // creates instance of settings in the Vue

    Vue.mixin({
        created: function () {
            this.$options.$vc = {
                settings : settings
            };
        }
    });

    // content directive

    Vue.directive(settings.basename + '-content', {

        // assigning css classes from settings

        bind (el, binding, vnode, oldVnode) {
            vnode.elm.classList.add(vnode.context.$options.$vc.settings.contentClassDefault);
        }
    });

    // toggler directive

    Vue.directive(settings.basename + '-toggle', {

        // adding toggle class

        bind (el, binding, vnode, oldVnode) {
            vnode.elm.classList.add(vnode.context.$options.$vc.settings.togglerClassDefault);
        },

        // Creating custom toggler handler

        inserted (el, binding, vnode, oldVnode) {
            if (binding.value != null) {
                vnode.elm.addEventListener('click', function () {
                    vnode.context.$refs[binding.value].status = !vnode.context.$refs[binding.value].status;
                }.bind(this));
            }
        }
    });
};
if (typeof window !== 'undefined' && window.Vue) {
    window.Vue.use(VueCollapse)
}
/* harmony default export */ __webpack_exports__["a"] = (VueCollapse);

/***/ }),
/* 51 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(52)
}
var normalizeComponent = __webpack_require__(10)
/* script */
var __vue_script__ = __webpack_require__(56)
/* template */
var __vue_template__ = __webpack_require__(57)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "node_modules/vue2-collapse/src/components/wrapper.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-6987e66d", Component.options)
  } else {
    hotAPI.reload("data-v-6987e66d", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 52 */
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(53);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(54)("3e7f1690", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../css-loader/index.js!../../../vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-6987e66d\",\"scoped\":false,\"hasInlineConfig\":true}!../../../vue-loader/lib/selector.js?type=styles&index=0!./wrapper.vue", function() {
     var newContent = require("!!../../../css-loader/index.js!../../../vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-6987e66d\",\"scoped\":false,\"hasInlineConfig\":true}!../../../vue-loader/lib/selector.js?type=styles&index=0!./wrapper.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),
/* 53 */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(41)(false);
// imports


// module
exports.push([module.i, "\n.v-collapse-content{\n    max-height: 0;\n    -webkit-transition: max-height 0.3s ease-out;\n    transition: max-height 0.3s ease-out;\n    overflow: hidden;\n    padding: 0;\n}\n.v-collapse-content-end{\n    -webkit-transition: max-height 0.3s ease-in;\n    transition: max-height 0.3s ease-in;\n    max-height: 500px;\n}\n", ""]);

// exports


/***/ }),
/* 54 */
/***/ (function(module, exports, __webpack_require__) {

/*
  MIT License http://www.opensource.org/licenses/mit-license.php
  Author Tobias Koppers @sokra
  Modified by Evan You @yyx990803
*/

var hasDocument = typeof document !== 'undefined'

if (typeof DEBUG !== 'undefined' && DEBUG) {
  if (!hasDocument) {
    throw new Error(
    'vue-style-loader cannot be used in a non-browser environment. ' +
    "Use { target: 'node' } in your Webpack config to indicate a server-rendering environment."
  ) }
}

var listToStyles = __webpack_require__(55)

/*
type StyleObject = {
  id: number;
  parts: Array<StyleObjectPart>
}

type StyleObjectPart = {
  css: string;
  media: string;
  sourceMap: ?string
}
*/

var stylesInDom = {/*
  [id: number]: {
    id: number,
    refs: number,
    parts: Array<(obj?: StyleObjectPart) => void>
  }
*/}

var head = hasDocument && (document.head || document.getElementsByTagName('head')[0])
var singletonElement = null
var singletonCounter = 0
var isProduction = false
var noop = function () {}

// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
// tags it will allow on a page
var isOldIE = typeof navigator !== 'undefined' && /msie [6-9]\b/.test(navigator.userAgent.toLowerCase())

module.exports = function (parentId, list, _isProduction) {
  isProduction = _isProduction

  var styles = listToStyles(parentId, list)
  addStylesToDom(styles)

  return function update (newList) {
    var mayRemove = []
    for (var i = 0; i < styles.length; i++) {
      var item = styles[i]
      var domStyle = stylesInDom[item.id]
      domStyle.refs--
      mayRemove.push(domStyle)
    }
    if (newList) {
      styles = listToStyles(parentId, newList)
      addStylesToDom(styles)
    } else {
      styles = []
    }
    for (var i = 0; i < mayRemove.length; i++) {
      var domStyle = mayRemove[i]
      if (domStyle.refs === 0) {
        for (var j = 0; j < domStyle.parts.length; j++) {
          domStyle.parts[j]()
        }
        delete stylesInDom[domStyle.id]
      }
    }
  }
}

function addStylesToDom (styles /* Array<StyleObject> */) {
  for (var i = 0; i < styles.length; i++) {
    var item = styles[i]
    var domStyle = stylesInDom[item.id]
    if (domStyle) {
      domStyle.refs++
      for (var j = 0; j < domStyle.parts.length; j++) {
        domStyle.parts[j](item.parts[j])
      }
      for (; j < item.parts.length; j++) {
        domStyle.parts.push(addStyle(item.parts[j]))
      }
      if (domStyle.parts.length > item.parts.length) {
        domStyle.parts.length = item.parts.length
      }
    } else {
      var parts = []
      for (var j = 0; j < item.parts.length; j++) {
        parts.push(addStyle(item.parts[j]))
      }
      stylesInDom[item.id] = { id: item.id, refs: 1, parts: parts }
    }
  }
}

function createStyleElement () {
  var styleElement = document.createElement('style')
  styleElement.type = 'text/css'
  head.appendChild(styleElement)
  return styleElement
}

function addStyle (obj /* StyleObjectPart */) {
  var update, remove
  var styleElement = document.querySelector('style[data-vue-ssr-id~="' + obj.id + '"]')

  if (styleElement) {
    if (isProduction) {
      // has SSR styles and in production mode.
      // simply do nothing.
      return noop
    } else {
      // has SSR styles but in dev mode.
      // for some reason Chrome can't handle source map in server-rendered
      // style tags - source maps in <style> only works if the style tag is
      // created and inserted dynamically. So we remove the server rendered
      // styles and inject new ones.
      styleElement.parentNode.removeChild(styleElement)
    }
  }

  if (isOldIE) {
    // use singleton mode for IE9.
    var styleIndex = singletonCounter++
    styleElement = singletonElement || (singletonElement = createStyleElement())
    update = applyToSingletonTag.bind(null, styleElement, styleIndex, false)
    remove = applyToSingletonTag.bind(null, styleElement, styleIndex, true)
  } else {
    // use multi-style-tag mode in all other cases
    styleElement = createStyleElement()
    update = applyToTag.bind(null, styleElement)
    remove = function () {
      styleElement.parentNode.removeChild(styleElement)
    }
  }

  update(obj)

  return function updateStyle (newObj /* StyleObjectPart */) {
    if (newObj) {
      if (newObj.css === obj.css &&
          newObj.media === obj.media &&
          newObj.sourceMap === obj.sourceMap) {
        return
      }
      update(obj = newObj)
    } else {
      remove()
    }
  }
}

var replaceText = (function () {
  var textStore = []

  return function (index, replacement) {
    textStore[index] = replacement
    return textStore.filter(Boolean).join('\n')
  }
})()

function applyToSingletonTag (styleElement, index, remove, obj) {
  var css = remove ? '' : obj.css

  if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = replaceText(index, css)
  } else {
    var cssNode = document.createTextNode(css)
    var childNodes = styleElement.childNodes
    if (childNodes[index]) styleElement.removeChild(childNodes[index])
    if (childNodes.length) {
      styleElement.insertBefore(cssNode, childNodes[index])
    } else {
      styleElement.appendChild(cssNode)
    }
  }
}

function applyToTag (styleElement, obj) {
  var css = obj.css
  var media = obj.media
  var sourceMap = obj.sourceMap

  if (media) {
    styleElement.setAttribute('media', media)
  }

  if (sourceMap) {
    // https://developer.chrome.com/devtools/docs/javascript-debugging
    // this makes source maps inside style tags work properly in Chrome
    css += '\n/*# sourceURL=' + sourceMap.sources[0] + ' */'
    // http://stackoverflow.com/a/26603875
    css += '\n/*# sourceMappingURL=data:application/json;base64,' + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + ' */'
  }

  if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = css
  } else {
    while (styleElement.firstChild) {
      styleElement.removeChild(styleElement.firstChild)
    }
    styleElement.appendChild(document.createTextNode(css))
  }
}


/***/ }),
/* 55 */
/***/ (function(module, exports) {

/**
 * Translates the list format produced by css-loader into something
 * easier to manipulate.
 */
module.exports = function listToStyles (parentId, list) {
  var styles = []
  var newStyles = {}
  for (var i = 0; i < list.length; i++) {
    var item = list[i]
    var id = item[0]
    var css = item[1]
    var media = item[2]
    var sourceMap = item[3]
    var part = {
      id: parentId + ':' + i,
      css: css,
      media: media,
      sourceMap: sourceMap
    }
    if (!newStyles[id]) {
      styles.push(newStyles[id] = { id: id, parts: [part] })
    } else {
      newStyles[id].parts.push(part)
    }
  }
  return styles
}


/***/ }),
/* 56 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__defaults__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__defaults___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__defaults__);
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {
            nodes: {},
            status: false
        };
    },

    props: ['active'],

    // status watcher - change toggle element when status changes
    watch: {
        active: function active(status) {
            if (status != null) {
                this.status = status;
            }
        },

        status: function status(new_value, old_value) {
            this.$emit('onStatusChange', { vm: this, status: new_value, old_status: old_value });
            if (this.$parent.onlyOneActive === false) {
                Object(__WEBPACK_IMPORTED_MODULE_0__defaults__["toggleElement"])(this.nodes.content, this.$options.$vc.settings);
            } else {
                if (new_value === true && old_value === false) {
                    var active = this.$parent.$children.filter(function (el) {
                        return el.status === true;
                    });
                    if (active.length > 1) {
                        active.forEach(function (el) {
                            el.close();
                            Object(__WEBPACK_IMPORTED_MODULE_0__defaults__["closeElement"])(el.nodes.content, this.$options.$vc.settings);
                        }.bind(this));
                    }
                    Object(__WEBPACK_IMPORTED_MODULE_0__defaults__["openElement"])(this.nodes.content, this.$options.$vc.settings);
                    this.open();
                } else if (old_value === true && new_value === false) {
                    Object(__WEBPACK_IMPORTED_MODULE_0__defaults__["closeElement"])(this.nodes.content, this.$options.$vc.settings);
                    this.close();
                }
            }
        }
    },

    // collapse basic instance methods

    methods: {
        toggle: function toggle() {
            this.$emit('beforeToggle', this);
            this.status = !this.status;
            this.$emit('afterToggle', this);
        },
        close: function close() {
            this.$emit('beforeClose', this);
            this.status = false;
            this.$emit('afterClose', this);
        },
        open: function open() {
            this.$emit('beforeOpen', this);
            this.status = true;
            this.$emit('afterOpen', this);
        }
    },

    // mounting

    mounted: function mounted() {
        var _this = this;

        this.nodes.toggle = this.$el.querySelector('.' + this.$options.$vc.settings.togglerClassDefault);
        this.nodes.content = this.$el.querySelector('.' + this.$options.$vc.settings.contentClassDefault);
        this.$emit('afterNodesBinding', { vm: this, nodes: this.nodes });
        if (this.nodes.toggle !== null) {
            this.nodes.toggle.addEventListener('click', function () {
                _this.toggle();
            });
        }
        if (this.active != null) {
            this.status = this.active;
        }
    }
});

/***/ }),
/* 57 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { class: "vc-" + _vm.$options.$vc.settings.basename },
    [_vm._t("default")],
    2
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-6987e66d", module.exports)
  }
}

/***/ }),
/* 58 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(10)
/* script */
var __vue_script__ = __webpack_require__(59)
/* template */
var __vue_template__ = __webpack_require__(60)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "node_modules/vue2-collapse/src/components/group.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1325cad9", Component.options)
  } else {
    hotAPI.reload("data-v-1325cad9", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 59 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__defaults__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__defaults___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__defaults__);
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {};
    },

    props: {
        onlyOneActive: {
            default: false,
            type: Boolean
        }
    },

    // computed props for accessing elements
    computed: {
        elements: function elements() {
            return this.$children;
        },
        elements_count: function elements_count() {
            return this.$children.length;
        },
        active_elements: function active_elements() {
            return this.$children.filter(function (el) {
                return el.status === true;
            });
        }
    },
    methods: {
        closeAll: function closeAll() {
            this.$children.forEach(function (el) {
                el.close();
            });
        },
        openAll: function openAll() {
            this.$children.forEach(function (el) {
                el.open();
            });
        }
    }
});

/***/ }),
/* 60 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "v-collapse-group" }, [_vm._t("default")], 2)
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-1325cad9", module.exports)
  }
}

/***/ })
/******/ ]);