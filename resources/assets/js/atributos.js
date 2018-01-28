var vue = new Vue({ 
      el: '#container',
    created: function(){
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
          atributos: [],
        },
        index: -1,
    },
    computed: {
      mostrarPaginador: function () {
         
          return this.paginador.last_page !== 1;
        },

        
    },
    methods: {
          limpiarMensajes: function () {
              this.mensajeError = '';
              this.mensajeOk = '';
          },

          limpiarElemento: function () {
            document.querySelector("#entidad_descripcion_nuevo").value = '';
            document.querySelector("#entidad_orden_nuevo").value = 0;
            document.querySelector("#entidad_estado_nuevo").value = 1;
            document.querySelector("#entidadpadre_id_nuevo").value = 0;
            this.elemento.id = 0;
          },
          limpiarAtributo: function () {
              document.querySelector("#descripcion_nuevo").value = '';
              document.querySelector("#orden_nuevo").value = 0;
              document.querySelector("#estado_nuevo").value = 1;
              document.querySelector("#id_nuevo").value = 0;
           
          },
          armarPaginador: function (paginasVisibles = 10) {
              this.numeroPaginas = [];
              var desde = this.paginador.current_page-paginasVisibles;
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
          cambioPagina: function (page) {
              this.limpiarMensajes(); 
              this.obtenerElementos(page);
          },
          obtenerElementos: function (page = 1) {
            this.limpiarMensajes(); 
            var filtros = 'page=' + page;
            var url = urlActual + '/get?' + filtros;
              axios.get(url)
              .then(response => {  
                  this.elementos = response.data.data;
                  this.paginador = response.data;
                  this.armarPaginador();
                  // ventanaCargando();
                  $(window).scrollTop(0);
              }).catch(error => {
                  $(window).scrollTop(0);
                  // ventanaCargando();
                  this.mensajeError = 'Error interno.';
              });
          },

          eliminar: function (index) {
              var datos = new FormData();
              datos.append('id', document.querySelector("#entidadpadre_id_" + index).value);
              axios.post(
                  urlActual + '/delete', 
                  datos,
              )
              .then(response => {  
                  this.elementos = response.data.data;
                  this.paginador = response.data;
                  this.armarPaginador();
                  this.limpiarElemento();
                  
              }).catch(error => { 
                  $(window).scrollTop(0);
                  this.mensajeError = 'Error interno.';
                  this.limpiarElemento();
              });
          },

           cargarElemento: function (i) {
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

          validarGuardar: function (index) {
            var hasError = true;
            if (document.querySelector("#entidad_descripcion_" + index).value.trim().length == 0 ) {
              document.querySelector("#entidad_descripcion_" + index).parentElement.classList.add('has-error');
              hasError = false;
            } else {
              document.querySelector("#entidad_descripcion_" + index).parentElement.classList.remove('has-error');
            } 
            if (document.querySelector("#entidad_orden_" + index).value.trim().length == 0  || ! regExpSoloNumeros.test(document.querySelector("#entidad_orden_" + index).value)) {
              document.querySelector("#entidad_orden_" + index).parentElement.classList.add('has-error');
              hasError = false;
            } else {
              document.querySelector("#entidad_orden_" + index).parentElement.classList.remove('has-error');
            } 

            return hasError;
          },

          guardar: function (index) {
            if (this.validarGuardar(index)) {
              this.limpiarMensajes(); 
              var datos = new FormData();
              datos.append('orden', document.querySelector("#entidad_orden_" + index).value);
              datos.append('descripcion',  document.querySelector("#entidad_descripcion_" + index).value);
              datos.append('estado',  document.querySelector("#entidad_estado_" + index).value);
              if (document.querySelector("#entidadpadre_id_" + index).value > 0) {
                datos.append('id', document.querySelector("#entidadpadre_id_" + index).value);
              }
              axios.post(
                  urlActual + '/store', 
                  datos,
              )
              .then((response) => { 
                  this.elementos = response.data.data;
                  this.paginador = response.data;
                  this.armarPaginador();
                  this.limpiarElemento();
                 
              })
              .catch((error) => {
                  this.mensajeError = 'Error interno.';
                  this.limpiarElemento();
              });   
            }
          },

          validarGuardarAtributo: function (index) {

            var hasError = true;
            if (document.querySelector("#descripcion_" + index).value.trim().length == 0 ) {
              document.querySelector("#descripcion_" + index).parentElement.classList.add('has-error');
              hasError = false;
            } else {
              document.querySelector("#descripcion_" + index).parentElement.classList.remove('has-error');
            } 
            if (document.querySelector("#orden_" + index).value.trim().length == 0  || ! regExpSoloNumeros.test(document.querySelector("#orden_" + index).value)) {
              document.querySelector("#orden_" + index).parentElement.classList.add('has-error');
              hasError = false;
            } else {
              document.querySelector("#orden_" + index).parentElement.classList.remove('has-error');
            } 
            return hasError;
          },

          guardarAtributo: function (index) {
             if (this.validarGuardarAtributo(index)) {
              var datos = new FormData();
              datos.append('orden', document.querySelector("#orden_" + index).value);
              datos.append('descripcion', document.querySelector("#descripcion_" + index).value);
              datos.append('estado', document.querySelector("#estado_" + index).value);
              datos.append('entidad_id', this.elemento.id);
              if (document.querySelector("#id_" + index).value != 0) {
                datos.append('id', document.querySelector("#id_" + index).value);
              }
              axios.post(
                  urlActual + '/store_atributo', 
                  datos,
              )
              .then((response) => { 
                  this.elementos = response.data.data;
                  this.paginador = response.data;
                  this.armarPaginador();
                  this.cargarElemento(this.index);
                  this.limpiarAtributo();
              })
              .catch((error) => {
                  this.mensajeError = 'Error interno.';
                  this.limpiarAtributo();
                 
              });   
            }
          },

          eliminarAtributo: function (index) {
            var datos = new FormData();
            datos.append('id', document.querySelector("#id_" + index).value);
            axios.post(
                urlActual + '/destroy_atributo', 
                datos,
            )
            .then((response) => { 
                this.elementos = response.data.data;
                this.paginador = response.data;
                this.armarPaginador();
                this.cargarElemento(this.index);
                this.limpiarAtributo();
            })
            .catch((error) => {
                this.mensajeError = 'Error interno.';
                this.limpiarAtributo();
               
            });   
          },
      }
});
