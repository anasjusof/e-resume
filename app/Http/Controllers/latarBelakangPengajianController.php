<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\latarBelakangPengajian;

class latarBelakangPengajianController extends Controller
{
    public function showLatarBelakangPengajian(){
    	$latarBelakangPengajians = latarBelakangPengajian::where('user_id', Auth::user()->id)->paginate(5);

    	return view('user.latarBelakangPengajian', compact('latarBelakangPengajians'));
    }

    public function createLatarBelakangPengajian(Request $request){
    	
    	$input = $request->all();

		latarBelakangPengajian::create($input);

		return redirect()->back();
    }

    public function deleteLatarBelakangPengajian(Request $request){
    	
    	$latarBelakangPengajians = latarBelakangPengajian::findOrFail($request->latarBelakangPengajian_id);

		foreach($latarBelakangPengajians as $latarBelakangPengajian){
    		$latarBelakangPengajian->delete();
    	}

    	return redirect()->back();
    }

    public function updateLatarBelakangPengajian(Request $request){

		$input = $request->all();
		$latarBelakangPengajian = latarBelakangPengajian::findOrFail($input['id']);
		$latarBelakangPengajian->institusi = $input['institusi'];
		$latarBelakangPengajian->tahap_kelulusan = $input['tahap_kelulusan'];
		$latarBelakangPengajian->nama_kelulusan = $input['nama_kelulusan'];

		$latarBelakangPengajian->save();

        return redirect()->back();

	}
}