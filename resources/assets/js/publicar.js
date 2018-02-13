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
          descripcion: 'dsada',
          estado: 1,
          cantidad: 1,
          producto_id: 1,
          monto: 0,
      },


      index:  -1,
      entidades:  [],
      listadoPublicaciones: 0,
      tab: 0,
      imagenes: [],
     
       
    },
    computed: {
      deshabilitarBtnImagenes: function (){
        return this.elemento.descripcion.toString().trim().length == 0  ||  
               this.elemento.monto.toString().trim().length == 0  ||  
               !regExpSoloNumeros.test(this.elemento.estado)  ||
               ( this.elemento.cantidad.toString().trim().length == 0 || !regExpSoloNumeros.test(this.elemento.cantidad) ) ||
               this.elemento.producto_id.toString().trim().length == 0 ;
      } 
    },
    methods: {
      cancelarPublicacion: function() {
        this.listadoPublicaciones = 1;
        this.tab = 0;
        this.elemento.id = 0;
        this.elemento.descripcion = '';
        this.elemento.estado = 1;
        this.elemento.cantidad = 1;
        this.elemento.monto = 0;
        this.elemento.producto_id = '';
        this.cargarImagenALienzo(0);
      },

      cargarAtributos: function() {
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
        document.getElementById('imagenLienzo').src = 'http://placehold.it/900x400';
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
          img.src = 'http://placehold.it/900x400';
          img.setAttribute('width','900px');
          img.setAttribute('height','400px');
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
                     img.setAttribute('width','900px');
                     img.setAttribute('height','400px');
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


    }
});
