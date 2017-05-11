<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\Pengajaran;

class PengajaranController extends Controller
{
    public function showPengajaran(){
    	$pengajarans = Pengajaran::where('user_id', Auth::user()->id)->paginate(5);

    	return view('user.pengajaran', compact('pengajarans'));
    }

    public function createPengajaran(Request $request){
    	
    	$input = $request->all();

		Pengajaran::create($input);

		return redirect()->back();
    }

    public function deletePengajaran(Request $request){
    	
    	$pengajarans = Pengajaran::findOrFail($request->pengajaran_id);

		foreach($pengajarans as $pengajaran){
    		$pengajaran->delete();
    	}

    	return redirect()->back();
    }

    public function updatePengajaran(Request $request){

		$input = $request->all();
		$pengajaran = Pengajaran::findOrFail($input['id']);
		$pengajaran->kod_kursus = $input['kod_kursus'];
		$pengajaran->nama_kursus = $input['nama_kursus'];
		$pengajaran->sem = $input['sem'];
		$pengajaran->bil_pelajar = $input['bil_pelajar'];
		$pengajaran->tahap = $input['tahap'];

		$pengajaran->save();

        return redirect()->back();

	}}
