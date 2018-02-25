var vue = new Vue({
    el: '#container',
    created: function(){
      document.getElementById("container").classList.remove('hidden');
      this.cargarImagenALienzo(0);
    },
    data: {
      publicaciones : publicaciones,
      productos : productos,
      mensajeError: '',
      mensajeOk: '',
      elemento: {
          id: 0,
          producto: '',
          descripcion: '',
          estado: 1,
          cantidad: 0,
          producto_id: '',
          region_id: '',
          monto: '',
      },
      buscarFiltro: '',
      estadoFiltro: '',
      termino: false,
      index:  -1,
      entidades:  [],
      listadoPublicaciones: 1,
      tab: 0,
      imagenes: [],
      entidadesSeleccionadas: [],

    },
    computed: {
      deshabilitarBtnImagenes: function (){
        return this.elemento.descripcion.toString().trim().length == 0  ||
                this.elemento.region_id.toString().trim().length == 0  ||
               this.elemento.monto.toString().trim().length == 0  ||
               !regExpSoloNumeros.test(this.elemento.estado)  ||
               ( this.elemento.cantidad.toString().trim().length == 0 || !regExpSoloNumeros.test(this.elemento.cantidad) ) ||
               this.elemento.producto_id.toString().trim().length == 0 ;
      },
      deshabilitarBtnEditar: function (){
        return this.elemento.descripcion.toString().trim().length == 0  ||
               this.elemento.monto.toString().trim().length == 0  ||
               !regExpSoloNumeros.test(this.elemento.estado)  ||
               ( this.elemento.cantidad.toString().trim().length == 0 || !regExpSoloNumeros.test(this.elemento.cantidad) );
      }
    },
    methods: {
      filtrar: function() {
        document.location = urlActual + '?buscar='+ this.buscarFiltro +'&estado=' + this.estadoFiltro;
      },
      top: function() {
        $(window).scrollTop(0);
      },
      cancelarPublicacion: function() {
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
        this.entidadesSeleccionadas=[];
      },
      cargarTextoPublicacion : function() {
        var elt = document.getElementById('producto_id');
        if (elt.selectedIndex == '' || elt.selectedIndex == 0 ) {
          this.elemento.producto = ''
        } else {
          this.elemento.producto =  elt.options[elt.selectedIndex].text;
        }
      },
      obtenerEntidades: function(){
        var elems = document.getElementsByName('atributos[]');
        elems.forEach((selector) => {
          if (selector.value.toString().trim().length > 0  &&  this.entidadesSeleccionadas.indexOf(selector.parentElement.parentElement.firstChild.textContent) < 0 ) {
            this.entidadesSeleccionadas.push(selector.parentElement.parentElement.firstChild.textContent);
          }
        });
      },
      cargarAtributos: function() {
        this.cargarTextoPublicacion();
        productos.forEach((producto) => {
          if (producto.id == this.elemento.producto_id ) {
            this.entidades = producto.entidades;
          }

        });
      },
      cargarImagenesMiniaturas: function() {
        var i = 1;
        this.imagenes.forEach(function(img) {
           var nodeImg = document.getElementById('imagen_'+ i +'');
           nodeImg.src = img;
           var ns;
          i = i + 1;
        });
      },
      eliminarImagen: function(index) {
        for (var i=1; i < 6; i++) {
           document.getElementById('imagen_'+ i +'').src = '../images/no-image.jpg';
        };
        document.getElementById('imagenLienzo').src = 'http://placehold.it/640x580';
        this.imagenes.splice((index-1),1);
        this.cargarImagenesMiniaturas();
      },
      previsualizarImagen: function(index) {
        document.getElementById('imagenLienzo').src = this.imagenes[index-1];
      },
      cargarImagenALienzo: function(tipo){
        var canvas = document.getElementById('canvas');
        var context = canvas.getContext("2d");
        var img = new Image();
        var lienzo = document.getElementById("lienzo");
        if (tipo == 0) {

          img.onload = function() { context.drawImage(img, 0, 0); };
          img.src = 'http://placehold.it/700x400';
          img.setAttribute('width','640px');
          img.setAttribute('height','580px');
          img.setAttribute('id','imagenLienzo');
          lienzo.removeChild(lienzo.childNodes[0]);
          lienzo.appendChild(img);
        } else {

          var fileinput = document.getElementById('imagen');
          if(document.querySelector('#imagen').value.length > 0 && this.imagenes.length < 7)
          {
            var file = fileinput.files[0];
            if(file.type.match('image.*')) {
              var reader = new FileReader();
                // Read in the image file as a data URL.
              reader.readAsDataURL(file);
              reader.onload = function(evt){
                if( evt.target.readyState == FileReader.DONE) {
                    img.src = evt.target.result;
                    context.drawImage(img,100,100);
                     img.setAttribute('width','640px');
                     img.setAttribute('height','580px');
                     img.setAttribute('id','imagenLienzo');
                     lienzo.removeChild(lienzo.childNodes[0]);
                     lienzo.appendChild(img);
                     vue.imagenes.push(img.src);
                     vue.cargarImagenesMiniaturas();
                }
              }
            } else {
                alert("Solo se permiten imagenes");
            }
          }

        }
      },
      cargarElemento: function(index){
        this.index = index;
        this.elemento.id = this.publicaciones[this.index].id;

      },
      editarElemento: function(index){
        this.index = index;
        this.elemento.id = this.publicaciones[this.index].id;
        this.elemento.cantidad = this.publicaciones[this.index].cantidad;
        this.elemento.descripcion = this.publicaciones[this.index].descripcion;
        this.elemento.estado = this.publicaciones[this.index].estado;
        this.elemento.monto = this.publicaciones[this.index].monto;

      },
       actualizarElemento: function () {
          var datos = new FormData();
          datos.append('id', this.elemento.id);
          datos.append('descripcion', this.elemento.descripcion);
          datos.append('cantidad', this.elemento.cantidad);
          datos.append('monto', this.elemento.monto);
          datos.append('estado', this.elemento.estado);
          axios.post(
              urlActual + '/update',
              datos,
          )
          .then(response => {
              $(window).scrollTop(0);
              $('#editarModal').modal('hide');
              this.publicaciones[this.index].cantidad = this.elemento.cantidad;
              this.publicaciones[this.index].descripcion = this.elemento.descripcion;
              this.publicaciones[this.index].estado = this.elemento.estado;
              this.publicaciones[this.index].monto = this.elemento.monto;
              this.cancelarPublicacion();

          }).catch(error => {
              $(window).scrollTop(0);
              this.mensajeError = 'Error interno.';
              $('#editarModal').modal('hide');
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
              $(window).scrollTop(0);
              $('#eliminarModal').modal('hide');
              this.publicaciones.splice(this.index,1);
              this.cancelarPublicacion();

          }).catch(error => {
              $(window).scrollTop(0);
              this.mensajeError = 'Error interno.';
              $('#eliminarModal').modal('hide');
          });
      },
    }
});
