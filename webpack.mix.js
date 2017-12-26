let mix = require('laravel-mix');

// default from laravel with passport vue component.
// do we need this?
// mix.js('resources/assets/js/app.js', 'public/js')

mix.js('resources/assets/js/participant.js', 'public/js')
    .sass('resources/assets/sass/participant.scss', 'public/css');

// public directory theme mottestate
mix.options({
    processCssUrls: false
}).js('resources/assets/js/mottestate.js', 'public/js')
  .sass('resources/assets/sass/mottestate.scss', 'public/css')


if (mix.inProduction()) {
    mix.version();
}