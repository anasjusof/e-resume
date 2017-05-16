<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\PenilaiAkademik;

class PenilaiAkademikController extends Controller
{
    public function showPenilaiAkademik(){
    	$penilaiakademiks = PenilaiAkademik::where('user_id', Auth::user()->id)->paginate(5);

    	return view('user.penilaiAkademik', compact('penilaiakademiks'));
    }

    public function createPenilaiAkademik(Request $request){

    	$input = $request->all();

        PenilaiAkademik::create($input);

        return redirect()->back();
    }

    public function deletePenilaiAkademik(Request $request){

    	$penilaiakademiks = PenilaiAkademik::findOrFail($request->kajiandanpenyelidikan_id);

	foreach($penilaiakademiks as $penilaiakademik){
    		$penilaiakademik->delete();
    	}

    	return redirect()->back();
    }

    public function updatePenilaiAkademik(Request $request){

		$input = $request->all();
		$penilaiakademik = PenilaiAkademik::findOrFail($input['id']);
		$penilaiakademik->nama = $input['nama'];
		$penilaiakademik->tajuk_projek = $input['tajuk_projek'];
		$penilaiakademik->tahun = $input['tahun'];
		$penilaiakademik->peringkat = $input['peringkat'];

		$penilaiakademik->save();

        return redirect()->back();

	}
}
