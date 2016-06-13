var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
    mix.styles([
    	'main.css',
    	'responsive.css'
    ], 'public/css/app.css');
    
    mix.styles([
    	'bootstrap.min.css'
    ], 'public/css/bootstrap.css');

    mix.styles([
    	'animate.css',
    ], 'public/css/animate.css');
    
    mix.styles([
    	'camera.css'
    ], 'public/css/camera.css');

    mix.styles([
        'thumbnail-slider.css'
    ], 'public/css/thumbnail-slider.css');

    mix.styles([
    	'lightbox.css'
    ], 'public/css/lightbox.css');

    mix.scripts([
    	'bootstrap.min.js'
    ], 'public/js/bootstrap.js');

    mix.scripts([
    	'jquery.easing.1.3.js'
    ], 'public/js/jquery.easing.js');

    mix.scripts([
    	'jquery.mobile.customized.min.js'
    ], 'public/js/jquery.mobile.customized.js');

    mix.scripts([
    	'camera.min.js'
    ], 'public/js/camera.js');

    mix.scripts([
    	'main.js'
    ], 'public/js/app.js');

    mix.scripts([
        'thumbnail-slider.js'
    ], 'public/js/thumbnail-slider.js');

    mix.scripts([
        'lightbox.js'
    ], 'public/js/lightbox.js');

    mix.scripts([
    	'validator.min.js'
    ], 'public/js/validator.min.js');

    mix.version([
    	'css/app.css',
    	'css/bootstrap.css',
    	'css/animate.css',
    	'css/camera.css',
        'css/thumbnail-slider.css',
    	'css/lightbox.css',
    	'js/bootstrap.js',
    	'js/jquery.easing.js',
    	'js/jquery.mobile.customized.js',
    	'js/camera.js',
    	'js/app.js',
        'js/thumbnail-slider.js',
        'js/lightbox.js',
    	'js/validator.min.js',
    ]);
});
