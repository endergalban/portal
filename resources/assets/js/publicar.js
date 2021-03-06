import VueCollapse from 'vue2-collapse'
Vue.use(VueCollapse);
var vue = new Vue({
    el: '#container',

 // ...
    created: function(){
      document.getElementById("container").classList.remove('hidden');
      this.cargarImagenALienzo(0);
    },
    data: {
      tipo: 0,
      cabecera: 'Tipo de Publicación',
      tab: 0,
      listadoPublicaciones: 0,
      publicaciones : [],
      check: [],
      productos : [],
      mensajeError: [],
      mensajeOk: '',
      elemento: {
          id: 0,
          producto_id: '',
          placa: '',
          descripcion: '',
          titulo: '',
          monto: '',
          marca_id: '',
          modelo_id: '',
          anio_id: '',
          version_id: '',
          descripcion: '',
          carroceria_id: '',
          puerta_id: '',
          transmision_id: '',
          edicion_id: '',
          cilindrada_id: '',
          potencia_id: '',
          color_id: '',
          kilometro_id: '',
          motor_id: '',
          techo_id: '',
          combustible_id: '',
          direccion_id: '',
          producto_id: '',
          region_id: '',
          piezacarroceria_id: '',
          electrico_id: '',
          suspencion_id: '',
      },
      entidades: {
        region: [],
        marca: [],
        modelo: [],
        anio: [],
        version: [],
        carroceria: [],
        puerta: [],
        transmision: [],
        edicion: [],
        cilindrada: [],
        potencia: [],
        color: [],
        kilometraje: [],
        motor: [],
        techo: [],
        combustible: [],
        direccion: [],
        seguridad: [],
        comfort: [],
        sonido: [],
        exterior: [],
        ficha: [],
        piezacarroceria: [],
        electrico: [],
        suspencion: [],
      },
      buscarFiltro: '',
      estadoFiltro: '',
      termino: false,
      index:  -1,
  //    entidades:  [],
      imagenes: [],
      entidadesSeleccionadas: [],
      atributos: []

    },
    computed: {
      deshabilitarBtnPublicar: function (){
        return this.validar();
      },
      deshabilitarBtnContinuar: function (){
        return this.validarContinuar();
      },
      deshabilitarPublicarPieza: function (){
        return this.validarPublicarPieza();
      },
    },
    methods: {
      validar: function() {
        return this.elemento.producto_id.toString().trim().length == 0 ||
          this.elemento.monto.toString().trim().length == 0 ||
          !regExpPrecio.test(this.elemento.monto) ||
          this.elemento.descripcion.toString().trim().length == 0 ||
          this.elemento.titulo.toString().trim().length == 0 ||
          this.elemento.modelo_id.toString().trim().length == 0 ||
          this.elemento.anio_id.toString().trim().length == 0 ||
          this.elemento.region_id.toString().trim().length == 0 ||
          this.elemento.placa.toString().trim().length == 0 ||
          this.elemento.marca_id.toString().trim().length == 0;
      },
      validarContinuar: function() {
        return this.elemento.producto_id.toString().trim().length == 0 ||
          this.elemento.modelo_id.toString().trim().length == 0 ||
          this.elemento.marca_id.toString().trim().length == 0 ||
          this.elemento.anio_id.toString().trim().length == 0 ||
          this.elemento.region_id.toString().trim().length == 0 ||
          this.atributos.length == 0;
      },
      validarPublicarPieza: function() {
        let respuesta = false;
        this.atributos.forEach((item,key)=>{
          if (item.id.toString().trim().length == 0) {
            respuesta = true;
          }
          if (item.descripcion.toString().trim().length == 0) {
            respuesta = true;
          }
          if (item.observacion.toString().trim().length == 0) {
            respuesta = true;
          }
          if (!regExpPrecio.test(item.monto)) {
            respuesta = true;
          }
          if (item.estado.toString().trim().length == 0) {
            respuesta = true;
          }
        });
        return respuesta;
      },
      dataURItoBlob: function(dataURI) {
        // convert base64/URLEncoded data component to raw binary data held in a string
        var byteString;
        if (dataURI.split(',')[0].indexOf('base64') >= 0)
            byteString = atob(dataURI.split(',')[1]);
        else
            byteString = unescape(dataURI.split(',')[1]);

        // separate out the mime component
        var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

        // write the bytes of the string to a typed array
        var ia = new Uint8Array(byteString.length);
        for (var i = 0; i < byteString.length; i++) {
            ia[i] = byteString.charCodeAt(i);
        }

        return new Blob([ia], {type:mimeString});
      },
      volver: function() {
        this.tab = 0;
        this.tipo = 0;
        $(window).scrollTop(0);
      },
      publicarPieza: function(){
        if (this.validarPublicarPieza) {
          let request = new FormData();
          let arreglo = [];

          this.atributos.forEach((item,key)=>{
            var img = [];
            item.imagenes.forEach((imagen,i)=>{
              var blob = this.dataURItoBlob(imagen);
               request.append(item.id +"_imagenes[]", blob);
            });
            item.imagenes = [];
            arreglo.push(JSON.stringify(item));
          });
          request.append('data', JSON.stringify(this.atributos));

          axios.post('publicar/storepieza',
            request,
            {
              headers: {
                'Content-Type': 'multipart/form-data'
              }
            }
          )
          .then((response) => {
            this.limpiar();
            this.elemento.producto_id = '';
            this.tab = 0;
            this.tipo = 0;
            this.titulo = 'TIPO DE PUBLICACIÓN';
            if (response.data == 0) {
              this.mensajeOk = 'Felicidades tus productos ha sido publicado.'
            }
            $(window).scrollTop(0);
          })
          .catch((error) => {
            console.log(error);
            $(window).scrollTop(0);
          });

        }
      },
      guardar: function() {
        if(! this.validar()) {
          this.mensajeError = '';
          this.mensajeOk = '';
          var request = new FormData();
          var atributos = [];
          var imagenes = [];
          document.querySelectorAll('select[name="atributos[]"]').forEach((item,key)=>{
            if (item.value != '') {
              atributos.push(item.value);
            }
          });
          document.querySelectorAll('checkbox-atributos').forEach((item,key)=>{
            if (item.checked == true) {
              atributos.push(item.value);
            }
          });
          this.imagenes.forEach((item)=>{
            var blob = this.dataURItoBlob(item);
            request.append("imagenes[]", blob);
          });
          request.append('id', this.elemento.id);
          request.append('producto_id', this.elemento.producto_id);
          request.append('descripcion', this.elemento.descripcion);
          request.append('titulo', this.elemento.titulo);
          request.append('monto', this.elemento.monto);
          request.append('placa', this.elemento.placa);
          request.append('estado', 1);
          request.append('cantidad', 1);
          request.append('atributos',atributos);
          request.append('imagenes',imagenes);
          axios.post('publicar/store',
            request,
            {
              headers: {
                'Content-Type': 'multipart/form-data'
              }
            }
          )
          .then((response) => {
            if (response.data.errors) {
              this.mensajeError = response.data.errors;
            } else {
              this.limpiar();
              this.elemento.producto_id = '';
              this.tab = 0;
              this.tipo = 0;
              this.titulo = 'TIPO DE PUBLICACIÓN';
              this.eliminarImagen();
              this.elemento.producto_id = '';
              if (response.data == 0) {
                this.mensajeOk = 'Felicidades tu producto ha sido publicado.'
              } else {
                this.mensajeOk = 'Felicidades tu publicación ha sido actualiza.'
              }
            }
            $(window).scrollTop(0);
          })
          .catch((error) => {
            console.log(error);
            $(window).scrollTop(0);
          });
        }
      },
      obtenermodelos: function() {
        if (document.getElementById('id_marca').value > 0) {
          this.elemento.modelo_id = '';
          axios.get('/modelos/' + document.getElementById('id_marca').value + '/obtener')
          .then((response) => {
            this.entidades.modelo = response.data;
          })
          .catch((error) => {
            console.log(error);
          });
        }
      },
      obtener: function() {
        this.mensajeError = '';
        this.mensajeOk = '';
        this.limpiar();
        if (this.elemento.producto_id > 0) {
          var url = window.location.href + '/' + this.elemento.producto_id + '/obtener';
          axios.get(url)
          .then(function (response){
            var entidades = response.data;
            entidades.forEach((entidad, index) => {
                vue.entidades[entidad.descripcion] = entidad.atributos;
            });
          })
          .catch(function (error){
            console.log(error);
          })
        }
      },
      limpiar: function() {
        this.entidades.marca = [];
        this.entidades.modelo = [];
        this.entidades.anio = [];
        this.entidades.version = [];
        this.entidades.carroceria = [];
        this.entidades.puerta = [];
        this.entidades.transmision = [];
        this.entidades.edicion = [];
        this.entidades.cilindrada = [];
        this.entidades.potencia = [];
        this.entidades.color = [];
        this.entidades.kilometraje = [];
        this.entidades.motor = [];
        this.entidades.techo = [];
        this.entidades.combustible = [];
        this.entidades.direccion = [];
        this.entidades.seguridad = [];
        this.entidades.comfort = [];
        this.entidades.sonido = [];
        this.entidades.exterior = [];
        this.entidades.ficha = [];

        this.elemento.id = 0;
        this.elemento.placa = '';
        this.elemento.descripcion = '';
        this.elemento.titulo = '';
        this.elemento.monto = '';
        this.elemento.marca_id = '';
        this.elemento.modelo_id = '';
        this.elemento.anio_id = '';
        this.elemento.version_id = '';
        this.elemento.carroceria_id = '';
        this.elemento.puerta_id = '';
        this.elemento.transmision_id = '';
        this.elemento.edicion_id = '';
        this.elemento.cilindrada_id = '';
        this.elemento.potencia_id = '';
        this.elemento.color_id = '';
        this.elemento.kilometro_id = '';
        this.elemento.motor_id = '';
        this.elemento.techo_id = '';
        this.elemento.combustible_id = '';
        this.elemento.direccion_id = '';
        this.elemento.region_id = '';
        this.atributos = [];

      },
      cambioTipo: function(tipo,tab) {
        this.tipo = tipo;
        this.tab = tab;
        this.mensajeOk = '';
        this.mensajeError = '';
        if (this.tipo == 1) {
          this.cabecera  = 'Venta de Auto';
        } else {
          this.cabecera  = 'Venta de Partes';
        }
      },
      cargarImagenesMiniaturas: function(key) {
        var i = 1;
        if (key == 'null') {
          this.imagenes.forEach(function(img) {
            var nodeImg = document.getElementById('imagen_'+ i +'');
            nodeImg.src = img;
            i = i + 1;
          });
        } else {
          this.atributos[key].imagenes.forEach(function(img) {
            var nodeImg = document.getElementById('imagen_'+ key +'_'+ i);
            nodeImg.src = img;
            i = i + 1;
          });
        }
      },
      eliminarImagen: function(index,key = 'null') {
        if (key == 'null') {
             // document.getElementById('imagen_'+ i +'').src = '../images/no-image.jpg';
          this.imagenes.splice((index-1),1);
        } else {
          vue.atributos[key].imagenes.splice((index-1),1);
        }
      },
      anexarAtributo: function(itemArray, key) {
        let anexar = true;
        this.atributos.forEach((item)=>{
          if (item.id == this.entidades[itemArray][key].id) {
            anexar = false;
          }
        });
        if (anexar == true) {
          this.atributos.push(
            {
              id: this.entidades[itemArray][key].id,
              descripcion: this.entidades[itemArray][key].descripcion,
              estado: '',
              observacion: '',
              monto: '',
              imagenes: [],
              lado: [],
              producto_id: this.elemento.producto_id,
              modelo_id: this.elemento.modelo_id,
              marca_id: this.elemento.marca_id,
              anio_id: this.elemento.anio_id,
              region_id: this.elemento.region_id,
              carroceria_id: this.elemento.carroceria_id
            }
          );
        }
      },
      eliminarAtributo: function(index) {
        this.atributos.splice(index,1);
        if (this.atributos.length == 0) {
          this.tab = 1;
        }
      },
      armarPiezas: function() {
        this.tab = 2;
        $(window).scrollTop(0);

      },
      cargarImagenALienzo: function(tipo,key = 'null'){
        this.mensajeError = '';
        this.mensajeOk = '';
        if(document)
        var canvas = document.getElementById('canvas');
        var context = canvas.getContext("2d");
        var img = new Image();
        if (tipo == 0) {
          img.onload = function() { context.drawImage(img, 0, 0); };
        } else {
          if (key == 'null') {
            var fileinput = document.getElementById('imagen');
            if(document.querySelector('#imagen').value.length == 0 || this.imagenes.length > 6)
            {
              return false;
            }
          } else {
            var fileinput = document.getElementById('imagen_'+key);
            if(document.querySelector('#imagen_'+key).value.length == 0 || this.atributos[key].imagenes.length > 4)
            {
              return false;
            }

          }
          var file = fileinput.files[0];
          if (file.type.match('image.*')) {
            var reader = new FileReader();
            // Read in the image file as a data URL.
            reader.readAsDataURL(file);
            reader.onload = function(evt){
              if( evt.target.readyState == FileReader.DONE) {
                img.src = evt.target.result;
                context.drawImage(img,100,100);
                img.setAttribute('width','640px');
                if (key == 'null') {
                  vue.imagenes.push(img.src);
                } else {
                  vue.atributos[key].imagenes.push(img.src);
                }
              }
            }
          } else {
            alert("Solo se permiten imagenes");
          }

        }
      },
    }
});
