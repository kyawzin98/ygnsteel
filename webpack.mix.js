const mix = require('laravel-mix');

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

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/main.js', 'public/js')
    .sass('resources/sass/custom.scss', 'public/css')


    // .scripts([
    //     'node_modules/datatables.net/js/jquery.dataTables.js',
    //     'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js',
    //     'node_modules/datatables.net-responsive/js/dataTables.responsive.js',
    //     'node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.js',
    //     'node_modules/datatables.net-buttons/js/dataTables.buttons.js',
    //     'node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js',
    //     'node_modules/datatables.net-buttons/js/buttons.colVis.js',
    //     'node_modules/datatables.net-buttons/js/buttons.flash.js',
    //     'node_modules/datatables.net-buttons/js/buttons.html5.js',
    //     'node_modules/datatables.net-buttons/js/buttons.print.js',
    //     'node_modules/datatables.net-select/js/dataTables.select.js',
    //     'node_modules/datatables.net-keytable/js/dataTables.keyTable.js',
    //     'node_modules/jszip/dist/jszip.js',
    // ],'public/js/custom_plugin.js')
