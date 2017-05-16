<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\User;
use App\LatarBelakangPengajian;
use App\Penyeliaan;
use App\Pengajaran;
use App\KajianDanPenyelidikan;
use App\Penerbitan;
use App\PenilaiAkademik;

class ResumeController extends Controller
{
    public function index($u_id){
        
        if(Auth::user()->roles_id == 0){
            $user_id = Auth::user()->id;
        }
        
        if(Auth::user()->roles_id != 0){
            $user_id = $u_id;
        }
        
        $user = User::find($user_id);
            
        $latar_belakang_pengajians = LatarBelakangPengajian::where('user_id', $user_id)->get();
        
        $penyeliaans = Penyeliaan::where('user_id', $user_id)->get();
        
        $pengajarans = Pengajaran::where('user_id', $user_id)->get();
        
        $kajiandanpenyelidikans = KajianDanPenyelidikan::where('user_id', $user_id)->get();
        
        $penerbitans = Penerbitan::where('user_id', $user_id)->get();
        
        $penilaiakademiks = PenilaiAkademik::where('user_id', $user_id)->get();
        
        return view('resume.index', compact('user', 'latar_belakang_pengajians', 'penyeliaans', 'pengajarans', 'kajiandanpenyelidikans', 'penerbitans', 'penilaiakademiks'));
    }   
}
