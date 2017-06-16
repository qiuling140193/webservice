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

Route::resource('bar','BarController',['except'=>['create','edit']]);
Route::post('/login','AuthenticateController@authenticate');
Route::resource('kelas','RuangController');
Route::resource('admin','adminController');
Route::resource('user','userController');
Route::resource('nilai','nilaiController');
Route::resource('matakuliah', 'MataKuliahController');
Route::resource('jurusan', 'JurusanController');
Route::resource('fakultas', 'FakultasController');
Route::resource('krs', 'krsController');
Route::resource('mahasiswa', 'MahasiswaController');
Route::resource('jdwl', 'JadwalController');
Route::resource('dosen', 'DosenController');
Route::resource('khs', 'khsController');
