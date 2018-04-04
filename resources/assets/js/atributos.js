var vue = new Vue({
      el: '#container',
    created: function(){
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
          atributos: [],
        },

        elementoAtributo: {
          id: 0,
          orden: 0,
          descripcion: '',
          estado: 1,
          entidad_id: 0,
          entidad_descripcion: '',
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
      mostrarPaginador: function () {

          return this.paginador.last_page !== 1;
      },

      habilitarGuardarEntidad: function () {
          return this.elementoEntidad.descripcion.toString().trim().length == 0  ||
                this.elementoEntidad.orden.toString().trim().length == 0 ||
                this.elementoEntidad.estado.toString().trim().length == 0
                ;
      },

      habilitarGuardarAtributo: function () {
          return this.elementoAtributo.descripcion.toString().trim().length == 0  ||
                this.elementoAtributo.orden.toString().trim().length == 0 ||
                this.elementoAtributo.estado.toString().trim().length  == 0 ||
                this.elementoAtributo.entidad_id == 0
                ;
      },

    },
    methods: {
      limpiarMensajes: function () {
          this.mensajeError = '';
          this.mensajeOk = '';
      },


      setCargando: function (button) {
        if (this.cargando == true) {
          $('#' + button +'').button('reset');
          this.cargando = false;
        } else {
          $('#' + button +'').button('loading');
          this.cargando = true;
        }
      },


      limpiarElementoEntidad: function () {

        this.elementoEntidad.id = 0;
        this.elementoEntidad.descripcion = '';
        this.elementoEntidad.orden = 0;
        this.elementoEntidad.estado = 1;
        this.elementoEntidad.tipo = 1;
        this.elementoEntidad.atributos = [];
        this.index = -2;
      },
      limpiarElementoAtributo: function () {

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
      armarPaginador: function (tipo = 1) {
          var visibles = this.paginador.per_page;
          var arrayPaginador= [];
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
      cambioPagina: function (page) {
        this.desplegarAtributos = false;
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
              this.armarPaginador(1);
              // ventanaCargando();
              $(window).scrollTop(0);
          }).catch(error => {
              $(window).scrollTop(0);
              // ventanaCargando();
              this.mensajeError = 'Error interno.';
          });
      },

      eliminarElementoEntidad: function () {
          var datos = new FormData();
          datos.append('id', this.elementos[this.index].id);
          axios.post(
              urlActual + '/delete',
              datos,
          )
          .then(response => {
              this.elementos = response.data.data;
              this.paginador = response.data;
              this.armarPaginador(1);
              this.limpiarElementoEntidad();
             $("#eliminarModalEntidad").modal('hide');

          }).catch(error => {
              $(window).scrollTop(0);
              this.mensajeError = 'Error interno.';
              this.limpiarElementoEntidad();
             $("#eliminarModalEntidad").modal('hide');

          });
      },
      cargarElementoEntidad: function (i) {
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

      guardarElementoEntidad: function (index) {
          this.limpiarMensajes();
          var datos = new FormData();
          datos.append('orden', this.elementoEntidad.orden);
          datos.append('descripcion',  this.elementoEntidad.descripcion );
          datos.append('estado',  this.elementoEntidad.estado );
          datos.append('tipo',  this.elementoEntidad.tipo );
          datos.append('id',  this.elementoEntidad.id );
          axios.post(
              urlActual + '/store',
              datos,
          )
          .then((response) => {
              this.elementos = response.data.data;
              this.paginador = response.data;
              this.armarPaginador(1);
              this.limpiarElementoEntidad();


          })
          .catch((error) => {
              this.mensajeError = 'Error interno.';
              this.limpiarElementoEntidad();

          });
      },
      cambioPagina2: function (index,page) {
          this.limpiarMensajes();
          this.cargarElementoEntidadAtributo(index,page);
      },
      cargarElementoEntidadAtributo: function (index,page = 1) {
        this.limpiarElementoAtributo();
        this.limpiarElementoEntidad();
        this.desplegarAtributos = true;
        this.indexEntidadAtributo = index;
        this.elementoAtributo.entidad_descripcion = this.elementos[index].descripcion;
        var url = urlActual + '/obeneratributos/' + this.elementos[index].id + '?page=' +page;
          axios.get(url)
          .then(response => {
              this.atributos = response.data.data;
              this.paginador = response.data;
              this.armarPaginador(2);
          }).catch(error => {
              $(window).scrollTop(0);
              // ventanaCargando();
              this.mensajeError = 'Error interno.';
          });
      },

      cargarElementoAtributo: function (indexAtributoEntidad,indexAtributo) {
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
          this.atributoPadreDescripcion = this.atributos[indexAtributo].atributo_padre ? this.atributos[indexAtributo].atributo_padre.entidad.descripcion + ' > ' + this.atributos[indexAtributo].atributo_padre.descripcion: 'N/A';
        }
        this.elementoAtributo.entidad_id = this.elementos[indexAtributoEntidad].id;
      },

      guardarElementoAtributo: function (index) {
          var datos = new FormData();
          datos.append('orden', this.elementoAtributo.orden);
          datos.append('descripcion', this.elementoAtributo.descripcion);
          datos.append('estado', this.elementoAtributo.estado);
          datos.append('entidad_id', this.elementoAtributo.entidad_id);
          datos.append('id', this.elementoAtributo.id);
          if (this.atributoPadre != '') {
            datos.append('padre',  this.atributoPadre );
          }
          axios.post(
              urlActual + '/store_atributo',
              datos,
          )
          .then((response) => {
              this.atributos = response.data.data;
              this.paginador = response.data;
              this.armarPaginador(2);
              this.limpiarElementoAtributo();

          })
          .catch((error) => {
              this.mensajeError = 'Error interno.';
              this.limpiarElementoAtributo();
          });
      },

      eliminarElementoAtributo: function () {
        var datos = new FormData();
        datos.append('id', this.atributos[this.indexAtributo].id);
        axios.post(
            urlActual + '/destroy_atributo',
            datos,
        )
        .then((response) => {
            this.atributos = response.data.data;
            this.paginador = response.data;
            this.armarPaginador(2);
            this.limpiarElementoAtributo();
             $("#eliminarModalAtributo").modal('hide');
        })
        .catch((error) => {
            this.mensajeError = 'Error interno.';
            this.limpiarElementoAtributo();
            $("#eliminarModalAtributo").modal('hide');
        });
      },
      ventanaAtributoPadre: function(){
          $("#modalAtributoPadre").modal('show');
      },
      cerrarVentanaAtributoPadre: function(tipo){
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
      cargarAtributosPadre: function () {
        var url = urlActual + '/' + this.entidadPadre + '/atributos';
          axios.get(url)
          .then(response => {
              this.atributosPadre = response.data;
          }).catch(error => {
               console.log(error);
          });
      },
    }
});
