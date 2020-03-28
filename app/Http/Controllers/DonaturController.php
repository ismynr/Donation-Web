<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Donatur;

class DonaturController extends Controller
{
    public function index()
    {
        $donaturs = Donatur::all();
        return view('donaturs.index', compact('donaturs'));
    }

    public function create()
    {
        return view('donaturs.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'username' => 'required|min:3',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'no_hp' => 'required|min:11',
            'alamat' => 'required',
            'umur' => 'required'
        ]);

        $donaturs = Donatur::create([
            'email' => $request->email,
            'username' => $request->username,
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
        return view('donaturs.edit', compact('donaturs'));
    }

    public function update(Request $request, $donatur){
        $this->validate($request, [
            'email' => 'required',
            'username' => 'required|min:3',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'umur' => 'required'
        ]);

        $donaturs = Donatur::findOrfail($donatur);
        $donaturs->update([
            'email' => $request->email,
            'username' => $request->username,
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
        $donaturs->delete();

        return redirect()->route('donatur.index');
    }
}
