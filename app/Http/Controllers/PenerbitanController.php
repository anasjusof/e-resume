<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\Penerbitan;

class PenerbitanController extends Controller
{
    public function showPenerbitan(){
    	$penerbitans = Penerbitan::where('user_id', Auth::user()->id)->paginate(5);

    	return view('user.penerbitan', compact('penerbitans'));
    }

    public function createPenerbitan(Request $request){
    	
    	$input = $request->all();

		Penerbitan::create($input);

		return redirect()->back();
    }

    public function deletePenerbitan(Request $request){
    	
    	$penerbitans = Penerbitan::findOrFail($request->penerbitan_id);

	foreach($penerbitans as $penerbitan){
    		$penerbitan->delete();
    	}

    	return redirect()->back();
    }

    public function updatePenerbitan(Request $request){

		$input = $request->all();
		$penerbitan = Penerbitan::findOrFail($input['id']);
		$penerbitan->maklumat_penerbitan = $input['maklumat_penerbitan'];
		$penerbitan->tahap = $input['tahap'];

		$penerbitan->save();

        return redirect()->back();

    }
}
