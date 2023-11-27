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

// Compila el archivo app.js ubicado en resources/js/ y lo guarda en public/js/
// También, utiliza postCss para procesar el archivo app.css ubicado en resources/css/
// y lo guarda en public/css/, aplicando una serie de procesadores (postcss-import, tailwindcss, autoprefixer).
mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

