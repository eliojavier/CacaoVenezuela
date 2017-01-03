const   elixir = require('laravel-elixir');
const   gulp = require('gulp'),
        watch = require('gulp-watch');
// require('laravel-elixir-vue-2');

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

elixir(mix => {
    mix.sass('app.scss')
        .sass('sb-admin.scss', 'public/css/sb-admin.css')
        .webpack('app.js')
        .webpack('datepicker.js')
});

gulp.task('stream', function () {
    // Endless stream mode
    return watch('css/*.css', { ignoreInitial: false })
        .pipe(gulp.dest('build'));
});

gulp.task('callback', function () {
    // Callback mode, useful if any plugin in the pipeline depends on the `end`/`flush` event
    return watch('css/*.css', function () {
        gulp.src('css/*.css')
            .pipe(gulp.dest('build'));
    });
});
