var vue = new Vue({ 
    el: '#container',
    created: function(){
      document.getElementById("container").classList.remove('hidden');
    
    },
    data: {

        index: -2,
        indexVentana: -2,
        elemento: {
          id: 0,
          descripcion: '',
        },
        asistencias: asistencias,
       
    },
    computed: {
      
    },
    methods: {
         limpiarElemento: function () {
          this.index = -2;
          this.elemento.id = 0;
          this.elemento.descripcion = '';
         },
         cargarElemento: function (index) {
          this.index = index;
          if (this.index == -1) {
            this.elemento.id = 0;
            this.elemento.descripcion = '';
          }
         },
         guardar: function () {
           $('#btnGuardar').button('loading');
         },

         cargarPublicaciones: function (index) {
           this.indexVentana = index;
           $('#publicacionesModal').modal();
         },
        
    }
});
