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

// homepage
Route::get('/', 'SiteController@home');
// daftar umkm
Route::get('/daftarumkm','DaftarController@index');
Route::get('/daftarumkm/{kategori}/listkt','DaftarController@listkategori');
Route::get('/daftarumkm/{kecamatan}/listkc','DaftarController@listkecamatan');
Route::get('/daftarumkm/{kelurahan}/listkl','DaftarController@listkelurahan');
Route::get('/daftarumkm/{umkm}/detail','DaftarController@detail');
Route::get('/daftarmap','DetailMapController@index');

// role member dan admin
Route::group(['middleware' => ['auth','checkRole:admin,member']],function(){
Route::get('/dashboard','DashboardController@index');
Route::get('/kategori','KategoriController@index');
Route::get('/kecamatan','KecamatanController@index');
Route::get('/kelurahan','KelurahanController@index');
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

    // umkm-ku
    Route::get('/umkmsaya','UmkmController@umkmsaya');
    Route::get('/addumkm','UmkmController@formumkm');
    Route::get('/ambilkelurahan/{id}','UmkmController@ambilkelurahan');
    Route::post('/umkm/create','UmkmController@create');
    Route::get('umkm/{umkm}/delete','UmkmController@delete');
    Route::get('/umkm/{umkm}/edit','UmkmController@edit');
    Route::post('/umkm/{umkm}/update','UmkmController@update');
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
Route::post('/kategori/create','KategoriController@create');
Route::get('kategori/{kategori}/delete','KategoriController@delete');
Route::get('/kategori/{kategori}/edit','KategoriController@edit');
Route::post('/kategori/{kategori}/update','KategoriController@update');

// kecamatan
Route::post('/kecamatan/create','KecamatanController@create');
Route::get('kecamatan/{kecamatan}/delete','KecamatanController@delete');
Route::get('/kecamatan/{kecamatan}/edit','KecamatanController@edit');
Route::post('/kecamatan/{kecamatan}/update','KecamatanController@update');

// kelurahan
Route::post('/kelurahan/create','KelurahanController@create');
Route::get('kelurahan/{kelurahan}/delete','KelurahanController@delete');
Route::get('/kelurahan/{kelurahan}/edit','KelurahanController@edit');
Route::post('/kelurahan/{kelurahan}/update','KelurahanController@update');

// umkm
Route::get('/umkm','UmkmController@index');

// Export Member
Route::get('/member/exportexcel','MemberController@exportExcel');
Route::get('/member/exportpdf','MemberController@exportPdf');

// Export Member
Route::get('/umkm/exportexcel','UmkmController@exportExcel');
Route::get('/umkm/exportpdf','UmkmController@exportPdf');

// posts
Route::get('/posts','PostController@index')->name('posts.index');

// tombol liat berita
Route::get('/post/add',[
    'uses' => 'PostController@add',
    'as'   => 'posts.add'
]);

Route::post('post/create',[
    'uses' => 'PostController@create',
    'as'   => 'posts.create'
]);

Route::get('post/{post}/delete','PostController@delete');

});

// login dashboard
Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

// ganti password
Route::get('gantipassword', 'GantiPasswordController@index');
Route::post('gantipassword', 'GantiPasswordController@store')->name('ganti.password');

// tombol liat berita
Route::get('/{slug}',[
    'uses' => 'SiteController@singlepost',
    'as'   => 'site.single.post'
]);