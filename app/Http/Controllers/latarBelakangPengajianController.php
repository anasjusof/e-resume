<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LatarBelakangPengajianRequest;

use Auth;
use App\LatarBelakangPengajian;

class latarBelakangPengajianController extends Controller
{
    public function showLatarBelakangPengajian(){
    	$latarBelakangPengajians = LatarBelakangPengajian::where('user_id', Auth::user()->id)->paginate(5);

    	return view('user.latarBelakangPengajian', compact('latarBelakangPengajians'));
    }

    public function createLatarBelakangPengajian(LatarBelakangPengajianRequest $request){
    	
    	$input = $request->all();

		LatarBelakangPengajian::create($input);

		return redirect()->back();
    }

    public function deleteLatarBelakangPengajian(Request $request){
    	
    	$latarBelakangPengajians = LatarBelakangPengajian::findOrFail($request->latarBelakangPengajian_id);

		foreach($latarBelakangPengajians as $latarBelakangPengajian){
    		$latarBelakangPengajian->delete();
    	}

    	return redirect()->back();
    }

    public function updateLatarBelakangPengajian(LatarBelakangPengajianRequest $request){

		$input = $request->all();
		$latarBelakangPengajian = LatarBelakangPengajian::findOrFail($input['id']);
		$latarBelakangPengajian->institusi = $input['institusi'];
		$latarBelakangPengajian->tahap_kelulusan = $input['tahap_kelulusan'];
		$latarBelakangPengajian->nama_kelulusan = $input['nama_kelulusan'];

		$latarBelakangPengajian->save();

        return redirect()->back();

	}
}
