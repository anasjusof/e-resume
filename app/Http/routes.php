<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/showRegister', ['uses'=>'UserController@showRegister'])->name('showRegister');

Route::get('/senaraipensyarah', ['uses'=>'AdminController@index'])->name('admin.index');

Route::get('/maklumatperibadi', ['uses'=>'UserController@showMaklumatPeribadi'])->name('showMaklumatPeribadi');
Route::patch('/updatemaklumatperibadi', ['uses'=>'UserController@updateMaklumatPeribadi'])->name('updateMaklumatPeribadi');

Route::get('/latarbelakangpengajian', ['uses'=>'latarBelakangPengajianController@showLatarBelakangPengajian'])->name('showLatarBelakangPengajian');
Route::post('/createlatarbelakangpengajian', ['uses'=>'latarBelakangPengajianController@createLatarBelakangPengajian'])->name('createLatarBelakangPengajian');
Route::patch('/updatelatarbelakangpengajian', ['uses'=>'latarBelakangPengajianController@updateLatarBelakangPengajian'])->name('updateLatarBelakangPengajian');
Route::delete('/deletelatarbelakangpengajian', ['uses'=>'latarBelakangPengajianController@deleteLatarBelakangPengajian'])->name('deleteLatarBelakangPengajian');

Route::get('/penyeliaan', ['uses'=>'PenyeliaanController@showPenyeliaan'])->name('showPenyeliaanController');
Route::post('/createpenyeliaan', ['uses'=>'PenyeliaanController@createPenyeliaan'])->name('createPenyeliaanController');
Route::patch('/updatepenyeliaan', ['uses'=>'PenyeliaanController@updatePenyeliaan'])->name('updatePenyeliaanController');
Route::delete('/deletepenyeliaan', ['uses'=>'PenyeliaanController@deletePenyeliaan'])->name('deletePenyeliaanController');

Route::get('/pengajaran', ['uses'=>'PengajaranController@showPengajaran'])->name('showPengajaranController');
Route::post('/createpengajaran', ['uses'=>'PengajaranController@createPengajaran'])->name('createPengajaranController');
Route::patch('/updatepengajaran', ['uses'=>'PengajaranController@updatePengajaran'])->name('updatePengajaranController');
Route::delete('/deletepengajaran', ['uses'=>'PengajaranController@deletePengajaran'])->name('deletePengajaranController');

