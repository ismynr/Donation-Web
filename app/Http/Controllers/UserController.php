<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Pengurus;
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
            'nip'       => 'required|numeric',
            'nama'      => 'required|min:2',
            'jabatan'   => 'required',
        ]);

        $user = User::find(Auth::user()->id);
        $user->role = "pengurus";
        $user->save();
        
        // Make Data Pengurus
        $pengurus = new Pengurus;
        $pengurus->id_user = Auth::user()->id;
        $pengurus->nip = $request->nip;
        $pengurus->nama = $request->nama;
        $pengurus->jabatan = $request->jabatan;
        $pengurus->save();

        return redirect('/pengurus');
    }
}
