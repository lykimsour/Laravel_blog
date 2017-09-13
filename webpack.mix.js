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
   	'./node_modules/aa-style/js/jquery.min.js',
   	'./node_modules/aa-style/js/jquery.easing.1.3.js',
   	'./node_modules/aa-style/js/bootstrap.min.js',
   	'./node_modules/aa-style/js/jquery.waypoints.min.js',
   	'./node_modules/aa-style/js/main.js',
      './node_modules/admin/bower_components/moment/min/moment.min.js',
      './node_modules/admin/bower_components/fullcalendar/dist/fullcalendar.min.js',
      './node_modules/admin/bower_components/chosen/chosen.jquery.min.js',
      './node_modules/admin/bower_components/colorbox/jquery.colorbox-min.js',
      './node_modules/admin/bower_components/responsive-tables/responsive-tables.js',
      './node_modules/admin/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js',
      './node_modules/admin/js/jquery.dataTables.min.js',
      './node_modules/admin/js/jquery.cookie.js',
      './node_modules/admin/js/charisma.js',
      './node_modules/admin/js/jquery.noty.js',
      './node_modules/admin/js/jquery.raty.min.js',
      './node_modules/admin/js/jquery.iphone.toggle.js',
      './node_modules/admin/js/jquery.autogrow-textarea.js',
      './node_modules/admin/js/jquery.uploadify-3.1.min.js',
      './node_modules/admin/js/jquery.history.js'
   ], 'public/js/app.js')
   .copy('node_modules/aa-style/fonts/icomoon', 'public/fonts')
   .copy('node_modules/admin/fonts/', 'public/fonts').version();



  
