<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ResumeController extends Controller
{
    public function index(){
        return view('resume.index');
    }   
}
