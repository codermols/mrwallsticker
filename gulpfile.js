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
       .webpack('app.js');

   	mix.livereload([
   		'public/css/app.css',
	   	'resources/views/**/*blade.php',
	   	'public/js/app.js'
   ])	
});
