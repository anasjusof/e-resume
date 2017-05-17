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
    //return view('welcome');
    if(Auth::check()){
            if(Auth::user()->roles_id == 1){                // If roles id == 1, redirect to /senaraipensyarah @ admin page
	      return redirect('senaraipensyarah');
	    }
	    if(Auth::user()->roles_id == 0){                // If roles id == 0, redirect to /maklumatperibadi @ lecturer page
	      return redirect('maklumatperibadi');
	    }
	}
	else{
		return redirect('/login');
	}
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/showRegister', ['uses'=>'UserController@showRegister'])->name('showRegister');

#if auth(both admin and lecturer), then can use this route
Route::group(['middleware'=>['auth']], function(){
    Route::get('/resume/{id}', ['uses'=>'ResumeController@index'])->name('showResume');
});

#if auth and admin(RoleMiddleware = 1)
Route::group(['middleware'=>['auth', 'RoleMiddleware:1']], function(){
    Route::get('/senaraipensyarah', ['uses'=>'AdminController@index'])->name('admin.index');
});

#if auth and lecturer(RoleMiddleware = 0)
Route::group(['middleware'=>['auth', 'RoleMiddleware:0']], function(){
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

    Route::get('/kajiandanpenyelidikan', ['uses'=>'KajianDanPenyelidikanController@showKajianDanPenyelidikan'])->name('showKajianDanPenyelidikanController');
    Route::post('/createkajiandanpenyelidikan', ['uses'=>'KajianDanPenyelidikanController@createKajianDanPenyelidikan'])->name('createKajianDanPenyelidikanController');
    Route::patch('/updatekajiandanpenyelidikan', ['uses'=>'KajianDanPenyelidikanController@updateKajianDanPenyelidikan'])->name('updateKajianDanPenyelidikanController');
    Route::delete('/deletekajiandanpenyelidikan', ['uses'=>'KajianDanPenyelidikanController@deleteKajianDanPenyelidikan'])->name('deleteKajianDanPenyelidikanController');

    Route::get('/penerbitan', ['uses'=>'PenerbitanController@showPenerbitan'])->name('showPenerbitan');
    Route::post('/createpenerbitan', ['uses'=>'PenerbitanController@createPenerbitan'])->name('createPenerbitan');
    Route::patch('/updatepenerbitan', ['uses'=>'PenerbitanController@updatePenerbitan'])->name('updatePenerbitan');
    Route::delete('/deletepenerbitan', ['uses'=>'PenerbitanController@deletePenerbitan'])->name('deletePenerbitan');


    Route::get('/penilaiakademik', ['uses'=>'PenilaiAkademikController@showPenilaiAkademik'])->name('showPenilaiAkademik');
    Route::post('/createpenilaiakademik', ['uses'=>'PenilaiAkademikController@createPenilaiAkademik'])->name('createPenilaiAkademik');
    Route::patch('/updatepenilaiakademik', ['uses'=>'PenilaiAkademikController@updatePenilaiAkademik'])->name('updatePenilaiAkademik');
    Route::delete('/deletepenilaiakademik', ['uses'=>'PenilaiAkademikController@deletePenilaiAkademik'])->name('deletePenilaiAkademik');
});
