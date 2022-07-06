const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/admin-app.js', 'public/js')
    .sass('resources/scss/bootstrap5.scss', 'public/css')
    .postCss('resources/css/gallery-app.css', 'public/css')
    .postCss('resources/css/admin-app.css', 'public/css', [ require('tailwindcss') ]);
