<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengurus;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengurus::all();
        return view('pengurus.pengurus', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $pengurus = new Pengurus;
        $pengurus->nip = $request->nip;
        $pengurus->nama = $request->nama;
        $pengurus->jabatan = $request->jabatan;
        $pengurus->email = $request->email;
        $pengurus->password = $request->password;
        $pengurus->save();

        return redirect()->route('pengurus.index')->with('message', 'Data anda telah diupdate!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Pengurus::where('id', $id)->get(); // Mengambil satu Pengurus.
        return view('pengurus.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        Pengurus::where('id', $id)->update($data);
        return redirect()->route('pengurus.index')->with('message', 'Data anda telah diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pengurus::findOrFail($id);
        $data->delete();
        return redirect()->route('pengurus.index')->with('message', 'Data anda telah dihapus!');
    }
}
