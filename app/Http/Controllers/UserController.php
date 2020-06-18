<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Donatur;
use App\User;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_depan'        => 'required',
            'nama_belakang'     => 'required',
            'no_hp'             => 'required|numeric',
            'alamat'            => 'required',
            'umur'              => 'required|numeric',
        ]);

        $user = User::find(Auth::user()->id);
        $user->role = "donatur";
        $user->save();
        
        // Make Data Donatur
        $donatur = new Donatur();
        $donatur->id_user = Auth::user()->id;
        $donatur->nama_depan = $request->nama_depan;
        $donatur->nama_belakang = $request->nama_belakang;
        $donatur->no_hp = $request->no_hp;
        $donatur->alamat = $request->alamat;
        $donatur->umur = $request->umur;
        $donatur->email = Auth::user()->email;
        $donatur->save();

        return redirect()->route('donatur.dashboard')->withSuccess('Anda berhasil mendaftar sebagai DONATUR! Selamat bergabung!');
    }
}
