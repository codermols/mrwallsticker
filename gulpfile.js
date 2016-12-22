const elixir = require('laravel-elixir');
require('laravel-elixir-livereload');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
	.webpack('app.js')
    .copy('node_modules/font-awesome/fonts/**', 'public/fonts/')
    .copy('node_modules/font-awesome/css/font-awesome.css', 'resources/assets/css/libs/font-awesome.css')
    .copy('node_modules/sweetalert/dist/sweetalert.css', 'resources/assets/css/libs/sweetalert.css')
    .copy('node_modules/sweetalert/dist/sweetalert-dev.js', 'resources/assets/js/libs/sweetalert-dev.js')
    .copy('node_modules/sweetalert/dist/sweetalert.min.js', 'resources/assets/js/libs/sweetalert.min.js')
    .copy('node_modules/sweetalert/dist/sweetalert.min.js', 'resources/assets/js/libs/sweetalert.min.js')
    .copy('node_modules/slick-carousel/slick/slick.css', 'resources/assets/css/libs/slick.css')
    .copy('node_modules/slick-carousel/slick/slick-theme.css', 'resources/assets/css/libs/slick-theme.css')
    .copy('node_modules/slick-carousel/slick/fonts/**', 'public/css/fonts/')
    .copy('node_modules/slick-carousel/slick/slick.min.js', 'resources/assets/js/libs/slick.min.js')
    .scripts([
        'libs/sweetalert.min.js',
        'libs/slick.min.js',
    ], './public/js/libs.js')
    .styles([
        'libs/sweetalert.css',
        'libs/dropzone.css',
        'libs/slick.css',
        'libs/slick-theme.css',
        'libs/font-awesome.css',
    ], './public/css/libs.css')

   	mix.livereload([
   		'public/css/app.css',
	   	'resources/views/**/*blade.php',
	   	'public/js/app.js'
   ])
});
