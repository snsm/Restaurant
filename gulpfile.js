const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

/*elixir(mix => {
    mix.sass('app.scss')
       .webpack('app.js');
});*/

elixir(function(mix) {

    //
    mix.styles([
        'resources/assets/admin/css/admin.css',
    ], 'public/css/admin.css', './');

    mix.styles([
        'resources/assets/admin/css/amazeui.css',
        'resources/assets/admin/css/amazeui.flat.css',
        'resources/assets/admin/css/app.css',
    ], 'public/css/all.css', './');

    //
    mix.scripts([
        'resources/assets/admin/js/amazeui.ie8polyfill.js',
        'resources/assets/admin/js/amazeui.js',
        'resources/assets/admin/js/amazeui.widgets.helper.js',
        'resources/assets/admin/js/app.js',
        'resources/assets/admin/js/handlebars.min.js',
        'resources/assets/admin/js/jquery.min.js'
    ], 'public/js/all.js', './');

    mix.scripts([
        'resources/assets/admin/js/jquery.min.js'
    ], 'public/js/jquery.js', './');

    //
    mix.version(['css/all.css','css/admin.css', 'js/all.js','js/jquery.js'], 'public/build');

    mix.copy('resources/assets/admin/fonts', 'public/build/fonts');
    mix.copy('resources/assets/admin/layer', 'public/build/layer');
    mix.copy('resources/assets/images', 'public/build/images');

    mix.copy('resources/assets/wechat', 'public/build/wechat');

});
