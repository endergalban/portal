let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
//mix.js('resources/assets/js/validaciones.js', 'public/js/validaciones.js');
mix.js('resources/assets/js/users.js', 'public/js/users.js');
mix.js('resources/assets/js/atributos.js', 'public/js/atributos.js');
mix.js('resources/assets/js/asistencias.js', 'public/js/asistencias.js');
mix.js('resources/assets/js/publicar.js', 'public/js/publicar.js');
mix.js('resources/assets/js/productos.js', 'public/js/productos.js');
