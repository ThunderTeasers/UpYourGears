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
});

elixir(function(mix) {
    mix.sass('admin.scss');
});

elixir(function(mix) {
    mix.sass('login.scss');
});

elixir(function(mix) {
    mix.sass('user.scss');
});

elixir(function(mix) {
    mix.scripts(['fancybox.js', 'sidebar.js', 'mobile-menu.js']);
});