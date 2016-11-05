var elixir = require('laravel-elixir');

require('laravel-elixir-sass-lint');

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

elixir(function(mix){
    mix
        .sass('admin.scss')
        .scripts(['admin.js'])
        .browserSync({ proxy: 'laravel.dev' });
});

elixir(function(mix){
    mix.sass('app.scss');
});