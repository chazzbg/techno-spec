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
mix
    .js('resources/js/app.js', 'public/js/app.js')
    .js('resources/js/contract.js', 'public/js/contract.js')
    .js('resources/js/landlord.js', 'public/js/landlord.js')
    .js('resources/js/property.js', 'public/js/property.js')
    .js('resources/js/reports/due.js', 'public/js/reports/due.js')
    .js('resources/js/reports/own.js', 'public/js/reports/own.js')
    .sass('resources/sass/app.scss', 'public/css')
;
