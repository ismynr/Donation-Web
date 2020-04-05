<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Donatur;
use App\User;

class DonaturController extends Controller
{
    public function index()
    {
        $donaturs = Donatur::all();
        return view('usr_pengurus.donaturs.index', compact('donaturs'));
    }

    public function create()
    {
        return view('usr_pengurus.donaturs.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'no_hp' => 'required|min:11',
            'alamat' => 'required',
            'umur' => 'required'
        ]);

        $user = User::create([
            'name' => $request->nama_depan,
            'email' => $request->email,
            'role' => 'donatur',
            'password' => Hash::make($request->password),
        ]);

        $donaturs = Donatur::create([
            'id_user' => $user->id,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'umur' => $request->umur
        ]);

        return redirect()->route('donatur.index');
    }


    public function edit($donatur){
        $donaturs = Donatur::find($donatur);
        return view('usr_pengurus.donaturs.edit', compact('donaturs'));
    }

    public function update(Request $request, $donatur){
        $this->validate($request, [
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'umur' => 'required'
        ]);

        $donaturs = Donatur::findOrfail($donatur);
        $donaturs->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'umur' => $request->umur
        ]);

        return redirect()->route('donatur.index');
    }

       public function destroy($donatur){
        $donaturs = Donatur::findOrFail($donatur);
        $id_user = $donaturs->id_user;
        $donaturs->delete();

        $user = User::findOrFail($id_user);
        $user->delete();

        return redirect()->route('donatur.index');
    }
}
