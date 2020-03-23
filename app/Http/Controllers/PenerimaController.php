<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penerima;

class PenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Penerima::all();
        return view('penerima.penerima', compact('data'));
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
        $penerima = new Penerima;
        $penerima->nama = $request->nama;
        $penerima->alamat = $request->alamat;
        $penerima->tgl_lahir = $request->tgl_lahir;
        $penerima->jenkel = $request->jenkel;
        $penerima->umur = $request->umur;
        $penerima->jumkel = $request->jumkel;
        $penerima->penghasilan = $request->penghasilan;
        $penerima->save();

        return redirect()->route('penerima.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Penerima::where('id', $id)->get(); // Mengambil satu penerima.
        return view('penerima.penerima-detail', compact('data'));
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
        $data = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'jenkel' => 'required',
            'umur' => 'required',
            'jumkel' => 'required',
            'penghasilan' => 'required',
        ]);
        Penerima::where('id', $id)->update($data);
        return redirect()->route('penerima.index')->with('message', 'Data anda telah diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Penerima::findOrFail($id);
        $data->delete();
        return redirect()->route('penerima.index')->with('message', 'Data anda telah dihapus!');
    }
}
