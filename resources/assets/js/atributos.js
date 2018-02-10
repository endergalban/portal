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
        elementoEntidad: { 
          id: 0,
          orden: 0,
          descripcion: '',
          estado: 1,
          atributos: [],
        },

        elementoAtributo: { 
          id: 0,
          orden: 0,
          descripcion: '',
          estado: 1,
          entidad_id: 0,
        },

        cargando: false,
        index: -2,
        indexAtributo: -2,
        indexEntidadAtributo: -1,
    
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
        this.elementoEntidad.atributos = [];
        this.index = -2;
      },
      limpiarElementoAtributo: function () {
          
          this.elementoAtributo.id = 0;
          this.elementoAtributo.descripcion = '';
          this.elementoAtributo.orden = 0;
          this.elementoAtributo.estado = 1;
          this.elementoAtributo.entidad_id = 0;
          this.indexAtributo = -2;
       
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
              this.armarPaginador();
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
        if (this.index == -1) {
          this.elementoEntidad.id = 0;
          this.elementoEntidad.descripcion = '';
          this.elementoEntidad.orden = 0;
          this.elementoEntidad.estado = 1;
          this.elementoEntidad.atributos = [];
        } else {
          this.elementoEntidad.id = this.elementos[this.index].id;
          this.elementoEntidad.descripcion = this.elementos[this.index].descripcion;
          this.elementoEntidad.orden = this.elementos[this.index].orden;
          this.elementoEntidad.estado = this.elementos[this.index].estado;
          this.elementoEntidad.atributos = this.elementos[this.index].atributos;
        }
      },

      guardarElementoEntidad: function (index) {
          this.limpiarMensajes(); 
          var datos = new FormData();
          datos.append('orden', this.elementoEntidad.orden);
          datos.append('descripcion',  this.elementoEntidad.descripcion );
          datos.append('estado',  this.elementoEntidad.estado );
          datos.append('id',  this.elementoEntidad.id );
          axios.post(
              urlActual + '/store', 
              datos,
          )
          .then((response) => { 
              this.elementos = response.data.data;
              this.paginador = response.data;
              this.armarPaginador();
              this.limpiarElementoEntidad();
             
             
          })
          .catch((error) => {
              this.mensajeError = 'Error interno.';
              this.limpiarElementoEntidad();
              
          });   
      },

      cargarElementoEntidadAtributo: function (index) {
        this.limpiarElementoAtributo();
        this.limpiarElementoEntidad();
        this.indexEntidadAtributo = index; 
      },

      cargarElementoAtributo: function (indexAtributoEntidad,indexAtributo) {
        this.indexAtributo = indexAtributo;
        if (this.indexAtributo == -1) {
          this.elementoAtributo.id = 0;
          this.elementoAtributo.descripcion = '';
          this.elementoAtributo.orden = 0;
          this.elementoAtributo.estado = 1;
        } else {
          this.elementoAtributo.id = this.elementos[indexAtributoEntidad].atributos[indexAtributo].id;
          this.elementoAtributo.descripcion = this.elementos[indexAtributoEntidad].atributos[indexAtributo].descripcion;
          this.elementoAtributo.orden = this.elementos[indexAtributoEntidad].atributos[indexAtributo].orden;
          this.elementoAtributo.estado = this.elementos[indexAtributoEntidad].atributos[indexAtributo].estado;
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
          axios.post(
              urlActual + '/store_atributo', 
              datos,
          )
          .then((response) => { 
              this.elementos = response.data.data;
              this.paginador = response.data;
              this.armarPaginador();
              this.limpiarElementoAtributo();
             
          })
          .catch((error) => {
              this.mensajeError = 'Error interno.';
              this.limpiarElementoAtributo();
          });   
      },

      eliminarElementoAtributo: function () {
        var datos = new FormData();
        datos.append('id', this.elementos[this.indexEntidadAtributo].atributos[this.indexAtributo].id);
        axios.post(
            urlActual + '/destroy_atributo', 
            datos,
        )
        .then((response) => { 
            this.elementos = response.data.data;
            this.paginador = response.data;
            this.armarPaginador();
            this.limpiarElementoAtributo();
             $("#eliminarModalAtributo").modal('hide');
        })
        .catch((error) => {
            this.mensajeError = 'Error interno.';
            this.limpiarElementoAtributo();
            $("#eliminarModalAtributo").modal('hide');
        });   
      },
    }
});
