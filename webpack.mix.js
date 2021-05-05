const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}

// css combines
mix.combine([
    'resources/css/libs/blog-post.css',
    'resources/css/libs/bootstrap.css',
    'resources/css/libs/bootstrap.min.css',
    'resources/css/libs/font-awesome.css',
    'resources/css/libs/metisMenu.css',
    'resources/css/libs/sb-admin-2.css',
    'resources/css/libs/styles.css'
], 'public/css/all-css.css');

//  js combines
mix.combine([
    'resources/js/libs/bootstrap.js',
    'resources/js/libs/bootstrap.min.js',
    'resources/js/libs/jquery.js',
    'resources/js/libs/metisMenu.js',
    'resources/js/libs/sb-admin-2.js',
    'resources/js/libs/scripts.js'
], 'public/js/all-js.js');
