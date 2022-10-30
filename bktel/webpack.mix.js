const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .vue()
    .sass("resources/sass/app.scss", "public/css");
mix.styles(
    ["resources/css/util.css", "resources/css/main.css"],
    "public/css/login.css"
);
mix.styles(
    ["public/fonts/fontawesome-free/css/all.min.css", "public/css/adminlte.min.css"],
    "public/css/admin.css"
);