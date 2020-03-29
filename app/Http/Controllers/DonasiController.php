<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;
use App\Category;
use App\Penerima;
use App\Donatur;

class DonasiController extends Controller
{
    public function index(Request $request){
        $dataDonasi = Donasi::All();
        $catDonasi = Category::All();
        $dataPenerima = Penerima::All();
        $dataDonatur = Donatur::All();
        return view('usr_pengurus.donasi.index', compact('dataDonasi', 'catDonasi', 'dataPenerima', 'dataDonatur'));
    }

    public function create(){
        // pake modal dialog
    }

    public function store(Request $request){
        $data = $request->validate([
            'id_kategori' => 'required|numeric',
            'id_penerima' => 'required|numeric',
            'id_donatur' => 'required|numeric',
            'jumlah_donasi' => 'required',
            'tanggal_memberi' => 'required',
        ]);
        Donasi::create($data);
        return redirect()->route('donasi.index')->with('message', 'Data anda telah diinputkan!');
    }

    public function show($id){
        $dataDonasi = Donasi::where('id_donasi', $id)->get();
        return view('usr_pengurus.donasi.detail', compact('dataDonasi'));
    }

    public function edit($id){
        // pake modal dialog
    }
    
    public function update(Request $request, $id){
        $data = $request->validate([
            'id_kategori' => 'required|numeric',
            'id_penerima' => 'required|numeric',
            'id_donatur' => 'required|numeric',
            'jumlah_donasi' => 'required',
            'tanggal_memberi' => 'required',
        ]);
        Donasi::where('id_donasi', $id)->update($data);
        return redirect()->route('donasi.index')->with('message', 'Data anda telah diupdate!');
    }

    public function destroy($id){
        $data = Donasi::findOrFail($id);
        $data->delete();
        return redirect()->route('donasi.index')->with('message', 'Data anda telah dihapus!');
    }
}
