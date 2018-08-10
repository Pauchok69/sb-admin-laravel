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
   .sass('resources/assets/sass/app.scss', 'public/css')
//    .sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/css/sb_admin')
//    .sass('resources/assets/sass/fontawesome.scss', 'public/css/sb_admin');
//
// mix.js('node_modules/datatables.net/js/*.js', 'public/js/sb_admin')
//     .js('node_modules/datatables.net-bs4/js/*.js', 'public/js/sb_admin')
//     .stylus('node_modules/datatables.net-bs4/css/*.css', 'public/css/sb_admin');