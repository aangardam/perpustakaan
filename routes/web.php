<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    // Mater
    Route::namespace('Master')->group(function () {
        Route::prefix('Master')->group(function () {
            Route::get('/','MasterController@index')->name('master');
            // denda
            Route::resource('/Denda','DendaController');
            Route::get('/Denda','DendaController@index')->name('Master/Denda');
            Route::get('/Denda/{id}/edit','DendaController@edit')->name('Master/Denda');
            // kategori
            Route::resource('/Kategori', 'KategoriController');
            Route::get('/Kategori','KategoriController@index')->name('Master/Kategori');
            Route::get('/Kategori/create','KategoriController@create')->name('Master/Kategori/create');
            Route::post('/Kategori/Import','KategoriController@Import')->name('Master/Kategori/Import');
            // Penerbit
            Route::resource('/Penerbit', 'PenerbitController');
            Route::get('/Penerbit','PenerbitController@index');
            Route::get('/Penerbit/create','PenerbitController@create');
            Route::post('/Penerbit/Import','PenerbitController@Import')->name('Master/Penerbit/Import');
            // Buku
            Route::resource('/Buku', 'BukuController');
            Route::get('/Buku','BukuController@index')->name('Master/Buku/');
            Route::get('/Buku/create','BukuController@create')->name('Master/Buku/create');
            Route::post('/Buku/Import','BukuController@Import')->name('Master/Buku/Import');
            // Member
            Route::resource('/Anggota', 'MemberController');
            Route::get('/Anggota','MemberController@index')->name('Master/Anggota');
            Route::get('/Anggota/create','MemberController@create')->name('Master/Anggota/create');
            Route::get('/Anggota/{id}/show','MemberController@show')->name('Master/Anggota/show');
            Route::get('/Anggota/{id}/active','MemberController@active')->name('Master/Anggota/active');
            Route::get('/Anggota/Print/{id}','MemberController@print')->name('Master/Anggota/print');
        });
    });

    
    Route::resource('Transaksi', 'TransaksiController');
    Route::get('transaksi/kembali/{id}','TransaksiController@kembali');
    // data transaksi
    Route::post('reporting/ajax/data','TransaksiController@data');
    
});

