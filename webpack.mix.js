let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/participant.js', 'public/js')
    .sass('resources/assets/sass/participant.scss', 'public/css');
   // .sass('resources/assets/sass/app.scss', 'public/css');

if (mix.inProduction()) {
    mix.version();
}