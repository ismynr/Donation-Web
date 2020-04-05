<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Pengurus;
use App\User;

class PengurusController extends Controller
{
    public function index()
    {
        $data = Pengurus::all();
        return view('usr_pengurus.pengurus.pengurus', compact('data'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $pengurusCreate = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'role' => 'pengurus',
            'password' => Hash::make($request->password),
        ]);

        $pengurus = new Pengurus;
        $pengurus->id_user = $pengurusCreate->id;
        $pengurus->nip = $request->nip;
        $pengurus->nama = $request->nama;
        $pengurus->jabatan = $request->jabatan;
        $pengurus->save();

        return redirect()->route('pengurus.index')->with('message', 'Data anda telah diupdate!');;
    }

    public function show($id)
    {
        $data = Pengurus::find($id)->get(); // Mengambil satu Pengurus
        return view('usr_pengurus.pengurus.detail', compact('data'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);
        Pengurus::where('id_pengurus', $id)->update($data);
        return redirect()->route('pengurus.index')->with('message', 'Data anda telah diupdate!');
    }

    public function destroy($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        $id_user = $pengurus->id_user;
        $pengurus->delete();

        $user = User::findOrFail($id_user);
        $user->delete();
        return redirect()->route('pengurus.index')->with('message', 'Data anda telah dihapus!');
    }
}
