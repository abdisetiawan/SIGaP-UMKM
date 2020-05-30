<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

// role member dan admin
Route::group(['middleware' => ['auth','checkRole:admin,member']],function(){
Route::get('/dashboard','DashboardController@index');
});

// role member
Route::group(['middleware' => ['auth','checkRole:member']],function(){
    // profile
    Route::get('/profilesaya','MemberController@profilesaya');

    // edit detail diri
    Route::get('/member/{member}/edit','MemberController@edit');
    Route::post('/member/{member}/update','MemberController@update');

    // galeri
    Route::get('/galeriku','GaleriController@galeriku');
    Route::post('/galeri/create','GaleriController@create');
    Route::get('/galeri/{galeri}/edit','GaleriController@edit');
    Route::post('/galeri/{galeri}/update','GaleriController@update');
    Route::get('galeri/{galeri}/delete','GaleriController@delete');
});

// role admin
Route::group(['middleware' => ['auth','checkRole:admin']],function(){

// member
Route::get('/adm','AdminController@index');
Route::post('/adm/create','AdminController@create');
Route::get('adm/{adm}/delete','AdminController@delete');

// member
Route::get('/member','MemberController@index');
Route::post('/member/create','MemberController@create');
Route::get('member/{member}/delete','MemberController@delete');

// berita
Route::get('/berita','BeritaController@index');
Route::post('/berita/create','BeritaController@create');
Route::get('berita/{berita}/delete','BeritaController@delete');

// kategori
Route::get('/kategori','KategoriController@index');
Route::post('/kategori/create','KategoriController@create');
Route::get('kategori/{kategori}/delete','KategoriController@delete');
Route::get('/kategori/{kategori}/edit','KategoriController@edit');
Route::post('/kategori/{kategori}/update','KategoriController@update');

// kecamatan
Route::get('/kecamatan','KecamatanController@index');
Route::post('/kecamatan/create','KecamatanController@create');
Route::get('kecamatan/{kecamatan}/delete','KecamatanController@delete');
Route::get('/kecamatan/{kecamatan}/edit','KecamatanController@edit');
Route::post('/kecamatan/{kecamatan}/update','KecamatanController@update');

// kelurahan
Route::get('/kelurahan','KelurahanController@index');
Route::post('/kelurahan/create','KelurahanController@create');
Route::get('kelurahan/{kelurahan}/delete','KelurahanController@delete');
Route::get('/kelurahan/{kelurahan}/edit','KelurahanController@edit');
Route::post('/kelurahan/{kelurahan}/update','KelurahanController@update');

// umkm
Route::get('/umkm','UmkmController@index');
Route::get('/addumkm','UmkmController@formumkm');
Route::post('/umkm/create','UmkmController@create');
Route::get('umkm/{umkm}/delete','UmkmController@delete');
Route::get('/ambilkelurahan/{id}','UmkmController@ambilkelurahan');

// laporan excel
Route::get('/member/exportexcel','MemberController@exportExcel');

// export pdf
Route::get('/member/exportpdf','MemberController@exportPdf');

});

// login dashboard
Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

// ganti password
Route::get('gantipassword', 'GantiPasswordController@index');
Route::post('gantipassword', 'GantiPasswordController@store')->name('ganti.password');