<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class AdminController extends Controller
{
    public function index(){
    	$users = User::where('roles_id', 0)->paginate(5);

    	return view('admin.index', compact('users'));
    }
}
