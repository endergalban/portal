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
          name: '',
          email: '',
          password: '',
          rut: '',
          estatus: true,
        },

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
              this.elemento.id = 0;
              this.elemento.name = '';
              this.elemento.rut = '';
              this.elemento.email = '';
              this.elemento.password = '';
              this.elemento.estatus = true;
              document.querySelector("#nombre").parentElement.classList.remove('has-error');
              document.querySelector("#rut").parentElement.classList.remove('has-error');
              document.querySelector("#password").parentElement.classList.remove('has-error');
              document.querySelector("#email").parentElement.classList.remove('has-error');
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

          eliminarElemento: function () {
              var datos = new FormData();
              datos.append('id', this.elemento.id);
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
            this.limpiarMensajes(); 
            if (index != -1) {
              this.elemento.id = this.elementos[index].id;
              this.elemento.name = this.elementos[index].name;
              this.elemento.email = this.elementos[index].email;
              this.elemento.rut = this.elementos[index].rut;
              this.elemento.estatus = this.elementos[index].estatus;
            }
          },

          validarGuardar: function () {
            var hasError = true;
            if (this.elemento.name.toString().trim().length == 0 ) {
              document.querySelector("#nombre").parentElement.classList.add('has-error');
              hasError = false;
            } else {
              document.querySelector("#nombre").parentElement.classList.remove('has-error');
            } 
            if (!regExRut.test(this.elemento.rut) ) {
              document.querySelector("#rut").parentElement.classList.add('has-error');
              hasError = false;
            } else {
              document.querySelector("#rut").parentElement.classList.remove('has-error');
            } 

            if (this.elemento.id == 0 ) {
              if (!regExPassword.test(this.elemento.password)) {
                document.querySelector("#password").parentElement.classList.add('has-error');
                hasError = false;
              } else {

              document.querySelector("#password").parentElement.classList.remove('has-error');
              }
            } else { 
              if (this.elemento.password.toString().trim().length > 0 && !regExPassword.test(this.elemento.password)) {
                document.querySelector("#password").parentElement.classList.add('has-error');
                hasError = false;
              } else {
                document.querySelector("#password").parentElement.classList.remove('has-error');
              } 
            }
            if (!regExpCorreoElectronico.test(this.elemento.email)) {
              document.querySelector("#email").parentElement.classList.add('has-error');
              hasError = false;
            } else {
              document.querySelector("#email").parentElement.classList.remove('has-error');
            } 

            return hasError;
          },

          guardar: function () {
            if (this.validarGuardar()) {
              this.limpiarMensajes(); 
              var datos = new FormData();
              datos.append('id', this.elemento.id);
              datos.append('name', this.elemento.name);
              datos.append('email', this.elemento.email);
              datos.append('rut', this.elemento.rut);
              datos.append('estatus', (this.elemento.estatus == true) ?  1 : 0);
              if (this.elemento.id == 0) {
                datos.append('password', this.elemento.password);
              }
              axios.post(
                  urlActual + '/store', 
                  datos,
              )
              .then((response) => { 
                  this.elementos = response.data.data;
                  this.paginador = response.data;
                  this.armarPaginador();
                  this.mensajeAlerta = 'Operación realizada con éxito'; 
                  $('#guardarModal').modal('hide');
              })
              .catch((error) => {
                  this.mensajeError = 'Error interno.';
              this.limpiarElemento();
                  $('#guardarModal').modal('hide');
              });   
            }

          },
      }
});
