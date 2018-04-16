import VueCarousel from 'vue-carousel';
import VueCollapse from 'vue2-collapse';
Vue.use(VueCollapse);
Vue.use(VueCarousel);
var vue = new Vue({
    el: '#container',
    data: {
      modelos: [],
      marca_id: ''
    },
    methods: {
      obtenermodelos: function() {
        if (this.marca_id != '') {
          axios.get('/modelos/' + this.marca_id + '/obtener')
          .then((response) => {
            this.modelos = response.data;
          })
          .catch((error) => {
            console.log(error);
          });
        } else {
          this.modelos = [];
        }
      },
    }
})
