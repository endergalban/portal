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
        paginador: '',
        numeroPaginas: [],
        elemento: {
          id: 0,
          descripcion: '',
          estado: 1,
          atributos: [],
        },
        cargando: false,
        index: -2,
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
            this.index = -2;
            this.elemento.id = 0;
            this.elemento.descripcion = '';
            this.elemento.estado = 1;
            this.elemento.atributos = [];
          },

          armarPaginador: function (paginasVisibles = 15) {
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
            ventanaCargando();
            axios.get(url)
            .then(response => {
              this.elementos = response.data.data;
              this.paginador = response.data;
              this.armarPaginador();
              ventanaCargando();
            }).catch(error => {
              this.mensajeError = 'Error interno.';
              ventanaCargando();
            });
          },

          eliminar: function (index) {
              var datos = new FormData();
              datos.append('id', this.elementos[index].id);
              ventanaCargando();
              axios.post(
                  urlActual + '/delete',
                  datos,
              )
              .then(response => {
                  this.elementos = response.data.data;
                  this.paginador = response.data;
                  this.armarPaginador();
                  this.limpiarElemento();
                  ventanaCargando();
              }).catch(error => {
                  this.mensajeError = 'Error interno.';
                  this.limpiarElemento();
                  ventanaCargando();
              });
          },

           cargarElemento: function (i) {
            this.limpiarElemento();
            this.index = i;
            if (this.index == -1) {
              this.elemento.id = 0;
              this.elemento.descripcion = '';
              this.elemento.estado = 1;
              this.elemento.atributos = [];
            }else{
              this.elemento.id = this.elementos[this.index].id;
              this.elemento.descripcion = this.elementos[this.index].descripcion;
              this.elemento.estado = this.elementos[this.index].estado;
              this.elemento.atributos = this.elementos[this.index].atributos;
            }

          },


          guardar: function (index) {

            var atributosselector = document.querySelectorAll("input[name^='atributos[']:checked");
            var atributos = [];
            for (var j = 0; j < atributosselector.length; j++) {
             atributos.push(atributosselector.item(j).value);
            }

            this.limpiarMensajes();
            var datos = new FormData();
            datos.append('descripcion',  this.elemento.descripcion);
            datos.append('estado',  this.elemento.estado);
            datos.append('id',  this.elemento.id);
            datos.append('atributos',  atributos);
            ventanaCargando();
            axios.post(
                urlActual + '/store',
                datos,
            )
            .then((response) => {
                this.elementos = response.data.data;
                this.paginador = response.data;
                this.armarPaginador();
                this.limpiarElemento();
                ventanaCargando();
            })
            .catch((error) => {
                this.mensajeError = 'Error interno.';
                this.limpiarElemento();
                ventanaCargando();
            });
          },
          verificarCheck: function (){
            var atributosselector = document.querySelectorAll("input[name^='atributos[']");
            for (var i = 0; i <  atributosselector.length; i++) {
              atributosselector[i].checked = false;
            }
            for (var i = 0; i <  atributosselector.length; i++) {
              for (var j = 0; j <  this.elemento.atributos.length; j++) {
                if (atributosselector[i].value == this.elemento.atributos[j].id) {
                  atributosselector[i].checked = true;
                }
              }
            };
          },
          marcarTodos: function(elt) {
            var estado = document.querySelector("#check_"+elt).checked;
            var atributosselector = document.querySelectorAll(".entidad_" + elt + "");
            for (var i = 0; i <  atributosselector.length; i++) {
              atributosselector[i].checked = estado;
            }
          },
      }
});
