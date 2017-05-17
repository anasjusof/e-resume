<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PenyeliaanRequest;

use Auth;
use App\Penyeliaan;

class PenyeliaanController extends Controller
{
    public function showPenyeliaan(){
    	$penyeliaans = Penyeliaan::where('user_id', Auth::user()->id)->paginate(5);

    	return view('user.penyeliaan', compact('penyeliaans'));
    }

    public function createPenyeliaan(PenyeliaanRequest $request){
    	
    	$input = $request->all();

		Penyeliaan::create($input);

		return redirect()->back();
    }

    public function deletePenyeliaan(Request $request){
    	
    	$penyeliaans = Penyeliaan::findOrFail($request->penyeliaan_id);

		foreach($penyeliaans as $penyeliaan){
    		$penyeliaan->delete();
    	}

    	return redirect()->back();
    }

    public function updatePenyeliaan(PenyeliaanRequest $request){

		$input = $request->all();
		$penyeliaan = Penyeliaan::findOrFail($input['id']);
		$penyeliaan->nama = $input['nama'];
		$penyeliaan->no_matrik = $input['no_matrik'];
		$penyeliaan->tajuk = $input['tajuk'];
		$penyeliaan->status = $input['status'];
		$penyeliaan->sem = $input['sem'];

		$penyeliaan->save();

        return redirect()->back();

	}}
