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

 mix.js('resources/js/admin.js', 'public/js')
 .sass('resources/sass/app.scss', 'public/css').options({
     processCssUrls: false
  }).copyDirectory( './node_modules/@fortawesome/fontawesome-free/webfonts/*', 'public/fonts/font-awesome' );

  mix.js('resources/js/front.js', 'public/js')
 .sass('resources/sass/front.scss', 'public/css').options({
     processCssUrls: false
  });

// frontoffice
/*
mix.js('resources/js/front.js', 'public/js')
 .sass('resources/sass/front.scss', 'public/css').options({
     processCssUrls: false});*/