<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\User;

class UserController extends Controller
{
    public function showRegister(){

        return view('auth.register');
    }

    public function showMaklumatPeribadi(){
    	$user = User::find(Auth::user()->id);

    	return view('user.maklumatPeribadi', compact('user'));
    }

    public function updateMaklumatPeribadi(Request $request){
    	$input = $request->all();

    	$user = User::find($input['id']);

    	//Store receipt
    	if(!empty($input['image'])){

            $file = $input['image'];

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $user->image = $name;
        }

    	$user->name = $input['name'];
    	$user->jawatan = $input['jawatan'];
    	$user->jabatan = $input['jabatan'];
    	$user->fakulti = $input['fakulti'];
    	$user->phone = $input['phone'];

    	$user->save();

    	return redirect()->back();
    }

    
}
