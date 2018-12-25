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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
	Route::resource('perusahaan', 'PerusahaanController');
	Route::resource('area', 'AreaController');
	Route::resource('lokasi', 'LokasiController');
	Route::resource('pengaduan', 'PengaduanController');
	Route::get('/lokasi/{id}/qrcode',[
			'as' => 'lokasi.qrcode',
			'uses' => 'QRCodeController@lokasi'
		]);
	Route::resource('member', 'MembersController');
	Route::resource('pengaduan', 'PengaduanController');
	Route::get('/pengaduans/{pengaduans}/tangani',[
			'as' => 'pengaduan.tangani',
			'uses' => 'PengaduanController@tangani'
		]);
	Route::post('/pengaduans/gabungkan',[
			'as' => 'pengaduan.gabungkan',
			'uses' => 'PengaduanController@merge'
		]);

	Route::post('/pengaduans/merges',[
			'as' => 'pengaduan.merges',
			'uses' => 'PengaduanController@merges'
		]);
	Route::get('/pengaduans/{id}/duplikat',[
			'as' => 'duplikat.index',
			'uses' => 'PengaduanController@duplikasi'
		]);

	Route::get('/pengaduans/{id}/deskripsi',[
			'as' => 'pengaduan.deskripsi',
			'uses' => 'PengaduanController@deskripsi'
		]);

	Route::get('/pengaduans/{pengaduans}/tangani',[
			'as' => 'pengaduan.tangani',
			'uses' => 'PengaduanController@tangani'
		]);

	Route::post('/pengaduan/{id}/nilai',[
			'as' => 'pengaduan.nilai',
			'uses' => 'PengaduanController@nilai'
		]);
	

	Route::resource('penanganan', 'PenangananController');

	Route::get('/penanganan/{id}/post_id',[
			'as' => 'penanganan.post_id',
			'uses' => 'PenangananController@post_id'
		]);
	Route::resource('pengajuan', 'PengajuanController');
	Route::resource('status', 'StatusController');

	Route::post('/pengajuan/{id}/tolak',[
			'as' => 'pengajuan.tolak',
			'uses' => 'PengajuanController@tolak'
		]);
	Route::post('/pengajuan/{id}/terima',[
			'as' => 'pengajuan.terima',
			'uses' => 'PengajuanController@terima'
		]);

});