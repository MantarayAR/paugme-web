var elixir = require('laravel-elixir');
var gulp = require('gulp');
var rename = require('gulp-rename');
var inlineCss = require('gulp-inline-css');

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

var email_view_path = 'resources/views/emails/*.hbs';
var email_css_path  = 'public/css/email.css';

elixir.extend('emails', function () {
    gulp.task('compile-emails', function () {

        return gulp.src(email_view_path)
            .pipe(inlineCss())
            .pipe(rename(function (path) {
                path.basename += "-compiled";
                path.extname = ".blade.php"
            }))
            .pipe(gulp.dest('resources/views/emails/build'));
    });

    this.registerWatcher('compile-emails', [
        email_view_path,
        'resources/assets/sass/**/*.scss'
    ]);
    // TODO also watch the sass path
    return this.queueTask('compile-emails');
});

elixir(function(mix) {
    mix.sass([
        'app.scss',
        'admin.scss',
    ]);

    mix.sass([
        'email.scss'
    ], email_css_path);

    mix.emails();

    mix.scripts([
        '_admin.js'
    ], 'public/js/admin.js');

    mix.scripts([
        '_lightbulb.js'
    ], 'public/js/home.js');

    mix.scripts([
        '_all.js'
    ], 'public/js/all.js');
});

