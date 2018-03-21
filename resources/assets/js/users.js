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
          name: '',
          lastname: '',
          email: '',
          password: '',
          telefono: '',
          direccion: '',
          region_id: '',
          rut: '',
          estatus: 1,
          tipo: 0,
        },
        index: -2,
        tipoFiltro: '',
        estatusFiltro: '',
        buscarFiltro: '',
    },
    computed: {
      mostrarPaginador: function () {
          return this.paginador.last_page !== 1;
      },
      habilitarGuardar: function () {
          return this.elemento.name.toString().trim().length == 0  ||
                 this.elemento.region_id.toString().trim().length == 0  ||
                !this.verificar(this.elemento.rut) ||
                !regExpCorreoElectronico.test(this.elemento.email) ||
                (this.index == -1 && !regExPassword.test(this.elemento.password) ) ||
                (this.index > -1 && this.elemento.password.toString().trim().length > 0 && !regExPassword.test(this.elemento.password ))
                ;
      },
    },
    methods: {
        formatoRut: function(data) {
            if (this.verificar(this.elemento.rut)) {
                var rut = this.elemento.rut;
                rut = rut.replace(new RegExp('[.]', 'g'),'');
                rut = rut.replace(new RegExp('[-]', 'g'),'');
                var numero = new Intl.NumberFormat('de-DE').format((rut.substr(0, rut.length - 1)));
                var dv = (rut.substr(rut.length - 1)).toLowerCase();
                this.elemento.rut = numero + '-' + dv;
            }
        },
        verificar: function(rut) {
            rut = rut.replace(new RegExp('[.]', 'g'),'');
            rut = rut.replace(new RegExp('[-]', 'g'),'');
            if ( validaRut(rut)) {

                return true;
            }

            return false;
        },
          limpiarMensajes: function () {
              this.mensajeError = '';
              this.mensajeOk = '';
          },
          limpiarElemento: function () {
              this.index = -2;
              this.elemento.id = 0;
              this.elemento.name = '';
              this.elemento.lastname = '';
              this.elemento.region_id = '';
              this.elemento.rut = '';
              this.elemento.email = '';
              this.elemento.password = '';
              this.elemento.direccion = '';
              this.elemento.telefono = '';
              this.elemento.estatus = true;
              this.elemento.tipo = 0;
              //document.querySelector("#nombre").parentElement.classList.remove('has-error');
              //document.querySelector("#rut").parentElement.classList.remove('has-error');
              //document.querySelector("#password").parentElement.classList.remove('has-error');
              //document.querySelector("#email").parentElement.classList.remove('has-error');
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
            var filtros = 'page=' + page +'&buscar=' + this.buscarFiltro + '&tipo=' + this.tipoFiltro + '&estatus=' + this.estatusFiltro;
            var url = urlActual + '/get?' + filtros;
              axios.get(url)
              .then(response => {
                  this.elementos = response.data.data;
                  this.paginador = response.data;
                  this.armarPaginador();
                  $(window).scrollTop(0);
              }).catch(error => {
                  $(window).scrollTop(0);
                  this.mensajeError = 'Error interno.';
              });
          },
          filtrar: function() {
            this.obtenerElementos();
          },
          eliminarElemento: function () {
              var datos = new FormData();
              datos.append('id', this.elementos[this.index].id);
              axios.post(
                  urlActual + '/delete',
                  datos,
              )
              .then(response => {
                  this.elementos = response.data.data;
                  this.paginador = response.data;
                  this.armarPaginador();
                  this.limpiarElemento();
                  $(window).scrollTop(0);
                  $('#eliminarModal').modal('hide');
              }).catch(error => {
                  $(window).scrollTop(0);
                  this.mensajeError = 'Error interno.';
                  $('#eliminarModal').modal('hide');
              });
          },
          cargarElemento: function (index) {
            this.limpiarElemento();
           // this.limpiarMensajes();
            this.index = index;
            if (this.index > -1) {
              this.elemento.id = this.elementos[index].id;
              this.elemento.name = this.elementos[index].name;
              this.elemento.lastname = this.elementos[index].lastname;
              this.elemento.email = this.elementos[index].email;
              this.elemento.rut = this.elementos[index].rut;
              this.elemento.telefono = this.elementos[index].telefono;
              this.elemento.direccion = this.elementos[index].direccion;
              this.elemento.estatus = this.elementos[index].estatus;
              this.elemento.tipo = this.elementos[index].tipo;
              this.elemento.region_id = this.elementos[index].region_id;
            } else {
              this.elemento.id = 0;
              this.elemento.name = '';
              this.elemento.lastname = '';
              this.elemento.region_id = '';
              this.elemento.email = '';
              this.elemento.rut = '';
              this.elemento.telefono = '';
              this.elemento.direccion = '';
              this.elemento.estatus = 1;
              this.elemento.tipo = 0;
            }
            $(window).scrollTop(0);
          },
          guardar: function () {

            this.limpiarMensajes();
            var datos = new FormData();
            datos.append('id', this.elemento.id);
            datos.append('name', this.elemento.name);
            datos.append('lastname', this.elemento.lastname);
            datos.append('email', this.elemento.email);
            datos.append('rut', this.elemento.rut);
            datos.append('estatus', this.elemento.estatus);
            datos.append('tipo', this.elemento.tipo);
            datos.append('telefono', this.elemento.telefono);
            datos.append('direccion', this.elemento.direccion);
            datos.append('region_id', this.elemento.region_id);
            if (this.elemento.password.toString().trim().length > 0) {

              datos.append('password', this.elemento.password);
            }
            axios.post(
                urlActual + '/store',
                datos,
            )
            .then((response) => {
              if (response.data == '-1') {
                 this.mensajeError = 'El rut ingresado ya se encuentra en los registros';
              } else if(response.data == '-2') {
                  this.mensajeError = 'El email ingresado ya se encuentra en los registros';
              } else {
                this.elementos = response.data.data;
                this.paginador = response.data;
                this.armarPaginador();
                this.limpiarElemento();
              }
            })
            .catch((error) => {
                this.mensajeError = 'Error interno.';
            });


          },
      }
});
