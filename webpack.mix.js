const mix = require('laravel-mix');

/** @member {function} DefinePlugin **/
mix.webpackConfig(webpack => {
    return {
        plugins: [
            new webpack.DefinePlugin({
                "__VUE_OPTIONS_API__": true,
                "__VUE_PROD_DEVTOOLS__": false,
            })
        ]
    }
});

mix.
    js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
