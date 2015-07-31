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

    mix.scripts([
        '_all.js'
    ], 'public/js/all.js');
});
