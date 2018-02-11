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
      },
      index:  -1,
      entidades:  [],
      listadoPublicaciones: 1,
      tab: 1,
      imagenes: [],
     
       
    },
    computed: {
      deshabilitarBtnImagenes: function (){
        return this.elemento.descripcion.toString().trim().length == 0  ||  
               !regExpSoloNumeros.test(this.elemento.estado)  ||
               ( this.elemento.cantidad.toString().trim().length == 0 || !regExpSoloNumeros.test(this.elemento.cantidad) ) ||
               this.elemento.producto_id.toString().trim().length == 0 ;
      } 
    },
    methods: {
      cancelarPublicacion: function() {
        listadoPublicaciones = 0
        this.tab = 0;
        this.elemento.id = 0;
        this.descripcion = '';
        this.estado = 1;
        this.cantidad = 1;
        this.producto_id = '';
        this.cargarImagenALienzo(0);
      },

      cargarAtributos: function() {
        productos.forEach((producto) => {
          if (producto.id == this.elemento.producto_id ) {
            this.entidades = producto.entidades;
          }
          
        });
      },

      cargarImagenALienzo: function(tipo){
        var canvas = document.getElementById('canvas');
        var context = canvas.getContext("2d"); 
        var img = new Image();
        var lienzo = document.getElementById("lienzo");
        if (tipo == 0) {

          img.onload = function() { context.drawImage(img, 0, 0); };
          img.src = 'http://maestroselectronics.com/wp-content/uploads/2017/12/No_Image_Available.jpg';
          img.setAttribute('width','450px');
          img.setAttribute('height','300px');
          img.setAttribute('id','imagenLienzo');
          //lienzo.removeChild('imagenLienzo');
          lienzo.appendChild(img);
        } else {

            var fileinput = document.getElementById('imagen'); 
            var file = fileinput.files[0];
            if(file.type.match('image.*')) {
              var reader = new FileReader();
                // Read in the image file as a data URL.
              reader.readAsDataURL(file);
              reader.onload = function(evt){
                if( evt.target.readyState == FileReader.DONE) {
                    img.src = evt.target.result;
                    context.drawImage(img,100,100);
                     img.setAttribute('width','450px');
                     img.setAttribute('height','300px');
                     img.setAttribute('id','imagenLienzo');
                     lienzo.removeChild(lienzo.childNodes[0]);
                     lienzo.appendChild(img);
                     vue.imagenes.push(img.src);
                }
              }
            } else {
                alert("Solo se permiten imagenes");
            }
         
        }
      },


    }
});
