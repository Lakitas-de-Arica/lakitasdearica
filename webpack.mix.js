const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .less('resources/less/core.less', 'public/css/app.css')

    .styles([
        'node_modules/@fortawesome/fontawesome-free/css/fontawesome.css',
        'node_modules/@fortawesome/fontawesome-free/css/brands.css',
        'node_modules/@fortawesome/fontawesome-free/css/solid.css',
        'node_modules/@fortawesome/fontawesome-free/css/v5-font-face.css',
        'node_modules/bootstrap/dist/css/bootstrap.css'
    ], 'public/css/core.css')

    .scripts([
        'node_modules/jquery/dist/jquery.js',
        'node_modules/bootstrap/dist/js/bootstrap.bundle.js'
    ], 'public/js/core.js')

    .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')

    /** FLICKITY */
    .styles([
        'node_modules/flickity/dist/flickity.css',
        'node_modules/flickity-fullscreen/fullscreen.css'
    ], 'public/css/flickity.css')

    .scripts([
        'node_modules/flickity/dist/flickity.pkgd.js',
        'node_modules/flickity-fullscreen/fullscreen.js'
    ], 'public/js/flickity.js')
    /** FLICKITY */

    if (mix.inProduction()) {
        mix.version();
    }
