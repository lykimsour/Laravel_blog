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

mix
   .sass('resources/assets/sass/app.scss', 'public/css')
   .options({
      processCssUrls: false
  	})
   .scripts([
   	'./node_modules/aa-style/plugins/jQuery/jquery-2.2.3.min.js',
   	'./node_modules/aa-style/js/modernizr-2.6.2.min.js',
   	'./node_modules/aa-style/js/jquery.min.js"',
   	'./node_modules/aa-style/js/jquery.easing.1.3.js',
   	'./node_modules/aa-style/js/bootstrap.min.js',
   	'./node_modules/aa-style/js/jquery.waypoints.min.js',
   	'./node_modules/aa-style/js/main.js',
   	], 'public/js/app.js')
   .copy('node_modules/aa-style/fonts/icomoon', 'public/fonts').version();
