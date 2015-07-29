var elixir = require('laravel-elixir');
require('laravel-elixir-browser-sync');
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

// Comment this line out for development:
elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix.sass([
        'app.scss'
    ]);
    mix.scripts([
            '_lightbulb.js'
        ],
        'public/js/home.js'
    );

    //mix.browserSync([
    //    'app/**/*',
    //    'public/**/*',
    //    'resources/views/**/*',
    //    'resources/assets/**/*',
    //], {
    //    proxy: 'http://localhost:8000'
    //});
});
