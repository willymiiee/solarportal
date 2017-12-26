console.log('loaded successfully prend!')

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}

require('../vendor/theme_mottestate/js/migrate.js')
require('../vendor/theme_mottestate/js/owl.carousel.min.js')
require('../vendor/theme_mottestate/js/custom.js')