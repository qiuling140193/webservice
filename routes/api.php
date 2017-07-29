<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/foos','FooController@cget');
// Route::get('/foos/{id}','FooController@get');
// Route::delete('/foos/{id}','FooController@delete');
// Route::post('/foos','FooController@post');
// Route::put('/foos/{id}','FooController@put');


Route::group(['prefix'=>'v1'], function(){
	Route::post('/login','AuthenticateController@authenticate');

	Route::group(['middleware'=>['jwt.auth']],function(){

			Route::resource('bar','BarController',['except'=>['create','edit']]);
			Route::resource('dosen', 'DosenController');
			Route::resource('admin','adminController');
			Route::resource('fakultas', 'FakultasController');
			Route::resource('jadwal', 'JadwalController');
			Route::resource('jurusan', 'JurusanController');
			Route::resource('mediafile','MediaFileController');
			Route::resource('mahasiswa', 'MahasiswaController');
			Route::resource('khs', 'khsController');
			Route::resource('bar','BarController');
			Route::resource('kelas','RuangController');
			Route::resource('user','userController');
			Route::resource('nilai','nilaiController');
			Route::resource('matakuliah', 'MataKuliahController');


Route::resource('krs', 'krsController');

	});
});



// Route::resource('jdwl', 'JadwalController');

// Route::resource('mediafile','MediaFileController');
