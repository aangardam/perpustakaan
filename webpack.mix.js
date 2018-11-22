const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

// Denda  
mix.js(
    [
      'resources/js/master/denda/index.js',
      'resources/js/master/denda/edit.js'
    ],
    'public/js/master/denda.js'
  );

  // Kategori
  mix.js(
    [
      'resources/js/master/kategori/index.js',
      'resources/js/master/kategori/edit.js'
    ],
    'public/js/master/kategori.js'
  );
// penerbit
mix.js(
  [
    'resources/js/master/penerbit/index.js',
    'resources/js/master/penerbit/edit.js'
  ],
  'public/js/master/penerbit.js'
);
// buku
mix.js(
  [
    'resources/js/master/buku/index.js',
    'resources/js/master/buku/edit.js',
    'resources/js/master/buku/create.js'
  ],
  'public/js/master/buku.js'
);

// member
mix.js(
  [
    'resources/js/master/member/index.js',
    'resources/js/master/member/edit.js',
    'resources/js/master/member/create.js'
  ],
  'public/js/master/member.js'
);