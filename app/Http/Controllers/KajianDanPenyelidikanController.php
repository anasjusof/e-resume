<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\KajianDanPenyelidikanRequest;

use Auth;
use App\KajianDanPenyelidikan;

class KajianDanPenyelidikanController extends Controller
{
    public function showKajianDanPenyelidikan(){
    	$kajiandanpenyelidikans = KajianDanPenyelidikan::where('user_id', Auth::user()->id)->paginate(5);

    	return view('user.kajianDanPenyelidikan', compact('kajiandanpenyelidikans'));
    }

    public function createKajianDanPenyelidikan(KajianDanPenyelidikanRequest $request){
    	
            $input = $request->all();

            KajianDanPenyelidikan::create($input);

            return redirect()->back();
    }

    public function deleteKajianDanPenyelidikan(Request $request){
    	
    	$kajiandanpenyelidikans = KajianDanPenyelidikan::findOrFail($request->kajiandanpenyelidikan_id);

		foreach($kajiandanpenyelidikans as $kajiandanpenyelidikan){
    		$kajiandanpenyelidikan->delete();
    	}

    	return redirect()->back();
    }

    public function updateKajianDanPenyelidikan(KajianDanPenyelidikanRequest $request){

		$input = $request->all();
		$kajiandanpenyelidikan = KajianDanPenyelidikan::findOrFail($input['id']);
		$kajiandanpenyelidikan->tajuk = $input['tajuk'];
		$kajiandanpenyelidikan->senarai_penyelidik = $input['senarai_penyelidik'];
		$kajiandanpenyelidikan->tahun_geran = $input['tahun_geran'];
		$kajiandanpenyelidikan->sumber = $input['sumber'];
		$kajiandanpenyelidikan->status = $input['status'];

		$kajiandanpenyelidikan->save();

        return redirect()->back();

	}
}
